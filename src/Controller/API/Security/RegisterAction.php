<?php

namespace App\Controller\API\Security;

use App\Entity\AppUser;
use App\Exceptions\API\Authentication\TooMuchSmsSendException;
use App\Exceptions\API\Security\RegisterInputException;
use App\Exceptions\API\User\UserAlreadyExistException;
use App\Utils\FormHandler\AppUserHandler;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Utils\Validator\Constraint\General\PhoneNumberConstraintValidator;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Rest\Version("v1")
 * @SWG\Tag(name="Authentification", description="All Authentification routes")
 *
 */
class RegisterAction extends AbstractController
{
    /**
     * Register route
     *
     * @Rest\Post("/register", name="register")
     *
     * @Rest\RequestParam(name="phoneNumber", key="phoneNumber", nullable=false, requirements=@AssertPhoneNumber(type="mobile"))
     * @Rest\RequestParam(name="password", key="password", description="The password", nullable=false, allowBlank=false)
     *
     * @param ParamFetcherInterface $paramFetcher
     * @param AppUserHandler $AppUserHandler
     * @param JWTTokenManagerInterface $JWTManager
     * @param EntityManagerInterface $em
     *
     * @param SmsSenderWrapper $smsSenderWrapper
     * @return JsonResponse
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Exception
     *
     * @SWG\Response(response=200, description="Return message user created and the token",
     *     @SWG\Schema(type="object",
     *     @SWG\Property(property="message", type="string", default="user created"),
     *     @SWG\Property(property="token", type="string"),
     *     required={"message", "token"},
     *     example={ "message": "user created",
     *               "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NDgzMjk0NjAsImV4cCI6MTU0ODMzNjY2MCwicm9sZXMiOlsiUk9MRV9BUFBfRlJBTkNFX0NPTk5FQ1RFRCJdLCJpZGVudGl0eSI6ImFiNWVmOTFhZGIxNDZmNDRjMjQ1NGMwMzA0ZTFiZGU0NDNmNjZiMmU0MjM5ZjQ2ODFhYTQ2NjQwMjljMjY1NGJ2MSJ9.cv8lP0AoJ99IKoyW054LYnJ7AmR7-U65W3AvsiQc2m1t-pJ3j14htqUL9HtVbLS1SB-yuBA5dihiQjVw9mu7tK8E0dk3M4e8ua5X0xl2gg6g_UI5cnfm2iUKdni2iOWG3oVztgXlDDZZ8eQr6wRVCgTzVbYPhw7s-j_D8zI7jZ8M7-KcWAa3GAus4JOpWLxpGrLK0je95IFsWs__-Hd3pmY65do28Tj4JF20oYNuicX34IwgqBHfhS9Vqvu82RdF9RV1GZxtNrHHbVpO23syr-4IWBQRhZ-3KepunLbQJC00Z26GrcVPw0LrW8pU-9qRr9EUWiab0Om56gGW5yWaeuC0uGFNcQiPoa9vgGmrHLuKusFTpIcdEKxzZes9GJxUvZHH8jOvremtrXx5IrVHVx4B38REsfxGffRrJXgM4xrKU3H6RdQ6hY7J2QZxtqnKQ-JyxkbLmMLoEpBtjwabg0WGGsR16dI_HAnt4xrSqmcMNyOfRZeFMgc86wv7zmXLakDGC4oBCVJiL8akagqIxPbkPWLDgfirWkuQc51c87e8aL4wtkAMhgPXB8QaS6iclUK0Uvg2NICitgJ-VsNL8-q2sY2AWXwWQHB4cKG97Z5V_z-P1Q7wXqI09VDNFyWsc6mgRCsNjxmt-uA1IdfhWr-kPNa3fThjnUCBhpU6dBk"
     *            }
     *   )
     * )
     * @SWG\Response(
     *     response=404,
     *     description="User already exist",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="message", type="string", example="Un problème est survenue, veuillez contacter un administrateur"),
     *          @SWG\Property(property="error", type="string", example="User already exist"),
     *          @SWG\Property(property="status", type="string", example="USER_ALREADY_EXIST"),
     *     )
     * )
     * @SWG\Response(
     *     response=412,
     *     description="You have a problem with your input data, please contact administrator of ANTS application",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="message", type="string", example="Un problème est survenue, veuillez contacter un administrateur"),
     *          @SWG\Property(property="error", type="string", example="You have a problem with your input data, please contact administrator of ANTS application"),
     *          @SWG\Property(property="status", type="string", example="REGISTER_INPUT_DATA"),
     *     )
     * )
     */
    public function __invoke(ParamFetcherInterface $paramFetcher,
                             AppUserHandler $AppUserHandler,
                             JWTTokenManagerInterface $JWTManager,
                             EntityManagerInterface $em): JsonResponse
    {
        $params = $paramFetcher->all();
        $userRepo = $em->getRepository(AppUser::class);
        $params['identity'] = $params['phoneNumber'];
        $params['username'] = $params['phoneNumber'];
        /** @var AppUser $user */
        $user = $userRepo->findOneBy(['identity' => $params['identity']]);
        if (null !== $user) {
            if (!in_array(AppUser::ROLE_APP_GUEST, $user->getRoles(), true)) {
                throw new UserAlreadyExistException(JsonResponse::HTTP_CONFLICT, 'User already exist');
            }
            $em->persist($user);
            $em->flush();
        }

        if (!($user = $AppUserHandler->handle($params, $user)) instanceof AppUser) {
            throw new RegisterInputException(JsonResponse::HTTP_PRECONDITION_FAILED, 'You have a problem with your input data, please contact administrator of ANTS application');
        }
        $em->persist($user);
        $em->flush();
        return new JsonResponse(['message' => 'user created', 'token' => $JWTManager->create($user)]);
    }
}

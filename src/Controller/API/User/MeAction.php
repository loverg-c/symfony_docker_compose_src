<?php

namespace App\Controller\API\User;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\Entity\AppUser;
use App\Utils\JsonSerializerWrapper;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Security;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Rest\Version("v1")
 * @SWG\Tag(name="Users", description="All User routes")
 *
 * @IsGranted(AppUser::ROLE_APP_GUEST)
 *
 * @Security(name="Bearer")
 *
 */
class MeAction extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/users/me", name="user_me")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Success",
     *     @SWG\Schema(ref=@Model(type=AppUser::class, groups={"getUser"}))
     * )
     *
     * @param JsonSerializerWrapper $jsonSerializerWrapper
     * @return Response
     */
    public function __invoke(JsonSerializerWrapper $jsonSerializerWrapper): Response
    {
        $jsonUser = $jsonSerializerWrapper->serialize($this->getUser(), [], ['getUser']);

        return new Response($jsonUser, 200);
    }
}

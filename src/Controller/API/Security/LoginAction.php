<?php

namespace App\Controller\API\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * @Rest\Version("v1")
 * @SWG\Tag(name="Authentification", description="All Authentification routes")
 *
 */
class LoginAction extends AbstractController
{

    /**
     * Authentication route
     *
     * @Rest\Post("/login", name="login")
     *
     * @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="JSON Payload",
     *          required=true,
     *          format="application/json",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="identity", type="string", example="NPvz7D2AuuHnJ4X-Dv6AICK38ZomT9mRfSH43516k9rkdhQ5ALv9LDZtsRjunkA-v1"),
     *              @SWG\Property(property="password", type="string", example="somepassword"),
     *     )
     * )
     *
     * @Rest\RequestParam(name="identity", key="identity", description="The identity", nullable=false)
     * @Rest\RequestParam(name="password", key="password", description="The password", nullable=false,  requirements="[a-zA-Z0-9]+")
     *
     * @param Request $request
     *
     * @SWG\Response(response=200, description="Returns the jwt token for auth", @SWG\Schema(
     *     type="object",
     *     @SWG\Property(property="token", type="string"),
     *     required={"token"},
     *     example={"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NDgzMjk0NjAsImV4cCI6MTU0ODMzNjY2MCwicm9sZXMiOlsiUk9MRV9BUFBfRlJBTkNFX0NPTk5FQ1RFRCJdLCJpZGVudGl0eSI6ImFiNWVmOTFhZGIxNDZmNDRjMjQ1NGMwMzA0ZTFiZGU0NDNmNjZiMmU0MjM5ZjQ2ODFhYTQ2NjQwMjljMjY1NGJ2MSJ9.cv8lP0AoJ99IKoyW054LYnJ7AmR7-U65W3AvsiQc2m1t-pJ3j14htqUL9HtVbLS1SB-yuBA5dihiQjVw9mu7tK8E0dk3M4e8ua5X0xl2gg6g_UI5cnfm2iUKdni2iOWG3oVztgXlDDZZ8eQr6wRVCgTzVbYPhw7s-j_D8zI7jZ8M7-KcWAa3GAus4JOpWLxpGrLK0je95IFsWs__-Hd3pmY65do28Tj4JF20oYNuicX34IwgqBHfhS9Vqvu82RdF9RV1GZxtNrHHbVpO23syr-4IWBQRhZ-3KepunLbQJC00Z26GrcVPw0LrW8pU-9qRr9EUWiab0Om56gGW5yWaeuC0uGFNcQiPoa9vgGmrHLuKusFTpIcdEKxzZes9GJxUvZHH8jOvremtrXx5IrVHVx4B38REsfxGffRrJXgM4xrKU3H6RdQ6hY7J2QZxtqnKQ-JyxkbLmMLoEpBtjwabg0WGGsR16dI_HAnt4xrSqmcMNyOfRZeFMgc86wv7zmXLakDGC4oBCVJiL8akagqIxPbkPWLDgfirWkuQc51c87e8aL4wtkAMhgPXB8QaS6iclUK0Uvg2NICitgJ-VsNL8-q2sY2AWXwWQHB4cKG97Z5V_z-P1Q7wXqI09VDNFyWsc6mgRCsNjxmt-uA1IdfhWr-kPNa3fThjnUCBhpU6dBk"})
     *   )
     * )
     */
    public function __invoke(Request $request)
    {
    }
}

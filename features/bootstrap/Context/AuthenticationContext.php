<?php

namespace App\Tests\Behat\Context;

use Behatch\Context\BaseContext;
use Behatch\HttpCall\Request;
use Behat\Mink\Element\DocumentElement;

class AuthenticationContext extends BaseContext
{
    /** @var Request */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Adds JWT Token to Authentication header for next request
     *
     * @Given /^I am successfully logged in with identity: "([^"]*)", and password: "([^"]*)"$/
     */
    public function iAmSuccessfullyLoggedInWithUsernameAndPassword(string $username, string $password): void
    {
        $json = json_encode([
            'identity' => $username,
            'password' => $password,
        ]);
        /** @var DocumentElement $response */
        $response = $this->request->send(
            'POST',
            $this->locatePath('api/login'),
            [],
            [],
            $json
        );

        $responseBody = \json_decode($response->getContent(), true);
        $this->request->setHttpHeader('Authorization', 'Bearer ' . $responseBody['token']);
    }

    /**
     * Adds JWT Token to Authentication header for next request
     *
     * @Given I am successfully loggedIn with token from response
     */
    public function iAmSuccessfullyLoggedInWithTokenFromResponse(): void
    {
        $page = $this->getSession()->getPage();
        preg_match('/token:\s"(.*)"/', $page->getContent(), $token);
        $token = $token[1];
        $this->request->setHttpHeader('Authorization', 'Bearer ' . $token);
    }
}

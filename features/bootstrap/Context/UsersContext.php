<?php

namespace App\Tests\Behat\Context;

use Behat\Gherkin\Node\TableNode;
use Behatch\Context\BaseContext;
use Behatch\HttpCall\Request;

class UsersContext extends BaseContext
{
    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @Given I am successfully Validate sms user
     */
    public function iAmSuccessfullyValidateSmsUser()
    {
        $body = [
            'smsCode' => JsonContext::$context['smsCode']
        ];
        return $this->request->send(
            'POST',
            $this->locatePath('api/validate-sms'),
            [],
            [],
            \json_encode($body)
        );
    }

    /**
     * @Given I am successfully update password with:
     */
    public function iAmSuccessfullyUpdatePassword(TableNode $nodes)
    {
        $body = [
            'smsCode' => JsonContext::$context['smsCode']
        ];
        foreach ($nodes->getRowsHash() as $node => $text) {
            $body[$node] = $text;
        }
        return $this->request->send(
            'POST',
            $this->locatePath('api/update-password'),
            [],
            [],
            \json_encode($body)
        );
    }

}

<?php

namespace App\Tests\Behat\Context;

use Behat\Gherkin\Node\TableNode;
use Behatch\Context\JsonContext as BaseJsonContext;
use RuntimeException;

class JsonContext extends BaseJsonContext
{
    /** @var array  */
    public static $context = [];

    /**
     * @Given I save a :node from response to context
     */
    public function addToContextFromResponse($node)
    {
        $json = $this->getJson();
        self::$context[$node] = $this->inspector->evaluate($json, $node);
    }

    /**
     * @Then the Array element should contain:
     */
    public function theArrayElementShouldContain(TableNode $nodes)
    {
        $json = $this->getJson();
        $contain = false;
        foreach ($json->getContent() as $element) {
            $exist = false;
            foreach ($nodes->getRowsHash() as $node => $text) {
                $exist = property_exists($element, $node);
                if (!$exist) {
                    break;
                }
                $regex   = '/' . preg_quote($text, '/') . '/ui';
                if (!preg_match($regex, $element->{$node})) {
                    $exist = false;
                    break;
                }
            }
            if ($exist) {
                $contain = true;
                continue;
            }
        }

        $this->assertTrue($contain);
    }

    /**
     * @Then the response collection should count :expectedValue items
     */
    public function theResponseCollectionShouldCountItems($expectedValue)
    {
        $json = $this->getJson();
        if ($expectedValue != count($json->getContent())) {
            throw new RuntimeException();
        }
        return;
    }
}
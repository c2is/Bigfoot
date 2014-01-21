<?php

class InheritedFeatureContext extends Behat\MinkExtension\Context\MinkContext
{
    /** @BeforeScenario */
    public function beforeScenario(Behat\Behat\Event\ScenarioEvent  $event)
    {
        $buildDirName = basename(getcwd());
        $baseUrl = str_replace("{PHPCI_BUILD_PATH}", $buildDirName, $this->getMinkParameter('base_url'));

        $this->setMinkParameter('base_url', $baseUrl);
    }
    /**
     * @Given /^I select the "([^"]*)" radio button with value "([^"]*)"$/
     */
    public function iSelectTheRadioButtonWithValue($radio, $value)
    {
        $radio_button = $this->getSession()->getPage()->findField($radio);
        if (null === $radio_button) {
            throw new ElementNotFoundException(
                $this->getSession(), 'form field', 'id|name|label|value', $field
            );
        }
        $radio_button->selectOption($value);
    }
    /**
     * @Then /^I evaluate script "([^"]*)"$/
     */
    public function iEvaluateScript($script)
    {
        $this->getSession()->evaluateScript($script);
    }
    /**
     * @Then /^I wait "([^"]*)"$/
     */
    public function iWait($milliSec)
    {
        $this->getSession()->wait($milliSec);
    }
    /**
     * @Then /^I wait for the suggestion box to appear$/
     */
    public function iWaitForTheSuggestionBoxToAppear()
    {
        $this->getSession()->wait(5000, "$('.suggestions-results').children().length > 0");
    }
    /**
     * @Then /^the response should contain regexp "([^"]*)"$/
     */
    public function theResponseShouldContainRegexp($arg1)
    {
        $content = $this->getSession()->getDriver()->getContent();
        if (! preg_match("`".$arg1."`is", $content)) {
            throw new Exception("No string matching regexp ".$arg1. " found in the response");
        }
    }
    /**
     * @Then /^the response should not contain regexp "([^"]*)"$/
     */
    public function theResponseShouldNotContainRegexp($arg1)
    {
        $content = $this->getSession()->getDriver()->getContent();
        if (preg_match("`".$arg1."`is", $content, $matches)) {
            unset($matches[0]);
            throw new Exception("String matching regexp ".$arg1. " found in the response: ".implode(" ", $matches));
        }

    }
    /**
     * @Then /^the response status code should be between "([^"]*)" "([^"]*)"$/
     */
    public function theResponseStatusCodeShouldBeBetween($arg1, $arg2)
    {
        $statusCode = $this->getSession()->getStatusCode();
        if ($statusCode < $arg1 or $statusCode > $arg2) {
            throw new Exception("Status code not between ".$arg1. " and ".$arg2.": ".$statusCode);
        }
    }
    /**
     * @Then /^the response should contains at least "([^"]*)" characters$/
     */
    public function theResponseShouldContainsAtLeastCharacters($arg1)
    {
        $len = strlen($this->getSession()->getDriver()->getContent());
        if ($len < $arg1) {
            throw new Exception("Response contains less than ".$arg1. " characters: ".$len);
        }
    }
}

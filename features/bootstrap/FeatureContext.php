<?php

// features/bootstrap/FeatureContext.php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

class FeatureContext implements SnippetAcceptingContext
{
    private $shelf;
    private $basket;

    public function __construct()
    {
        $this->shelf = new Shelf();
        $this->basket = new Basket($this->shelf);
        $this->https = new Https();
    }

    /**
     * @Given there is a :product, which costs £:price
     */
    public function thereIsAWhichCostsPs($product, $price)
    {
        $this->shelf->setProductPrice($product, floatval($price));
    }

    /**
     * @When I add the :product to the basket
     */
    public function iAddTheToTheBasket($product)
    {
        $this->basket->addProduct($product);
    }

    /**
     * @Then I should have :count product(s) in the basket
     */
    public function iShouldHaveProductInTheBasket($count)
    {
        PHPUnit_Framework_Assert::assertCount(
            intval($count),
            $this->basket
        );
    }

    /**
     * @Then the overall basket price should be £:price
     */
    public function theOverallBasketPriceShouldBePs($price)
    {
        PHPUnit_Framework_Assert::assertSame(
            floatval($price),
            $this->basket->getTotalPrice()
        );
    }
    

    /**
     * @Given There is a unsecure URL :arg1
     */
    public function thereIsAUnsecureUrl($arg1)
    {
        $this->https->checkIfUrlIsUnsecure($arg1);
    }

    /**
     * @When The Protocol of the URL must be converted from :arg1 to :arg2
     */
    public function theProtocolOfTheUrlMustBeConvertedFromTo($arg1, $arg2)
    {
        $this->https->setInputOutputProtokoll($arg1, $arg2);
    }

    /**
     * @Then The shoul be as secure as :arg1
     */
    public function theShoulBeAsSecureAs($arg1)
    {
        PHPUnit_Framework_Assert::assertContains(
            $this->https->outputProtocol,
            $this->https->getHttpsUrl($arg1)
        );
    }
}

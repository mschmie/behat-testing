<?php
/**
 * Created by PhpStorm.
 * User: msc
 * Date: 25.10.17
 * Time: 15:21
 */

final class Basket implements \Countable
{
    private $shelf;
    private $products;
    private $productsPrice = 0.0;

    public function __construct(Shelf $shelf)
    {
        $this->shelf = $shelf;
    }

    public function addProduct($product)
    {
        $this->products[] = $product;
        $this->productsPrice += $this->shelf->getProductPrice($product);
    }

    public function getTotalPrice()
    {
        $this->productsPrice += ($this->productsPrice * 0.2);
        $this->productsPrice += ($this->productsPrice > 10 ? 2.0 : 3.0);
        return $this->productsPrice;
    }

    public function count()
    {
        return count($this->products);
    }
}
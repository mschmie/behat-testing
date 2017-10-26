<?php
/**
 * Created by PhpStorm.
 * User: msc
 * Date: 25.10.17
 * Time: 15:20
 */

final class Shelf
{
    private $priceMap = array();

    public function setProductPrice($product, $price)
    {
        $this->priceMap[$product] = $price;
    }

    public function getProductPrice($product)
    {
        return $this->priceMap[$product];
    }
}
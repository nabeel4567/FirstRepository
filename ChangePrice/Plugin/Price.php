<?php

declare(strict_types=1);

namespace SimpleTask\ChangePrice\Plugin;

use Magento\Catalog\Model\Product;

/**
 * package Price
 */
class Price
{
    /**
     * @param Product $product
     * @param $price
     * @return float
     */
    public function aftergetPrice(Product $product, $price): float
    {
        $price = $product->getData('price');

        return $price + $price * 0.10;
    }
}

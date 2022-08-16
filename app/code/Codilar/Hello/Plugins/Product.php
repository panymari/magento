<?php

namespace Codilar\Hello\Plugins;

class Product
{
    public function afterGetName(\Magento\Catalog\Model\Product $product, $name)
    {
        $price= $product->getData('price');
        if($price < 1500) {
            $name .= " cheap";
        } else {
            $name .= " expensive";
        }

        return $name;
    }
}

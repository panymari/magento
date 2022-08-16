<?php

namespace Codilar\Hello\Model;

class Product extends \Magento\Catalog\Model\Product
{
    public function getName()
    {
        $name = parent::getName();

        $price = $this->getData('price');
        if($price < 1500) {
            $name .= " cheap";
        } else {
            $name .= " expensive";
        }
        return $name;
    }
}

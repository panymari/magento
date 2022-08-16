<?php

namespace Codilar\Hello\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Product implements ObserverInterface
{
    public function execute (Observer $observer)
    {
        $collection = $observer->getEvent()->getData('collection');
        foreach ($collection as $product) {
            $price= $product->getData('price');
            $name= $product->getData('name');
            if($price < 1500) {
                $name .= " cheap";
            } else {
                $name .= " expensive";
            }
            $product->setData('name', $name);
        }
    }
}

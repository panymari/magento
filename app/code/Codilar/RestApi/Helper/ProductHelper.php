<?php

namespace Codilar\RestApi\Helper;

use Magento\Framework\ObjectManagerInterface;

class ProductHelper
{
    protected ObjectManagerInterface $objectManager;

    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function formatPrice(int|float $price)
    {
        $priceHelper = $this->objectManager->get('Magento\Framework\Pricing\Helper\Data');
        return $priceHelper->currency($price, true, false);
    }
}

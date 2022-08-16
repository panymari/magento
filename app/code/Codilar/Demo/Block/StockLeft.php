<?php

namespace Codilar\Demo\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\App\ObjectManager;

class StockLeft extends Template
{

    public function getCurrentProduct()
    {
        $objectManager = ObjectManager::getInstance();
        $product = $objectManager->get('Magento\Framework\Registry')->registry('current_product');
        $stock = $objectManager->get('Magento\CatalogInventory\Api\StockRegistryInterface')->getStockItem($product->getId());
        return $stock->getQty();
    }
}

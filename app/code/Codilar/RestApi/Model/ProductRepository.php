<?php

namespace Codilar\RestApi\Model;

use Codilar\RestApi\Api\Data\ProductInterface;
use Codilar\RestApi\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\ObjectManagerInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected ObjectManagerInterface $objectManager;

    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @throws NoSuchEntityException
     */

    public function getProductById(int $id): ProductInterface {

        $productInterfaceFactory = $this->objectManager->get('Codilar\RestApi\Api\Data\ProductInterfaceFactory');
        $productRepository = $this->objectManager->get('Magento\Catalog\Api\ProductRepositoryInterface');
        $productHelper = $this->objectManager->get('Codilar\RestApi\Helper\ProductHelper');
        $stockRegistryInterface = $this->objectManager->get('Magento\CatalogInventory\Api\StockRegistryInterface');

        $productInterface = $productInterfaceFactory->create();
        try {
            $product = $productRepository->getById($id);
            $stock = $stockRegistryInterface->getStockItem($id);

            $productInterface->setId($product->getId());
            $productInterface->setName($product->getName());
            $productInterface->setPrice($productHelper->formatPrice($product->getPrice()));
            $productInterface->setDescription($product->getShortDescription());
            $productInterface->setQty($stock->getQty());
            return $productInterface;
        } catch (NoSuchEntityException $e) {
            throw NoSuchEntityException::singleField("id", $id);
        }

    }
}

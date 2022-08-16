<?php

namespace Codilar\RestApi\Api;

use Codilar\RestApi\Api\Data\ProductInterface;

interface ProductRepositoryInterface
{

    /**
     * @param int $id
     * @return ProductInterface
     */
    public function getProductById(int $id): ProductInterface;
}

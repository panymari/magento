<?php

namespace Codilar\RestApi\Model\Data;

use Codilar\RestApi\Api\Data\ProductInterface;
use Magento\Framework\DataObject;

class Product extends DataObject implements ProductInterface
{
    public function getId(): int
    {
        return $this->getData('id');
    }

    public function setId(int $id): static
    {
        return $this->setData('id', $id);
    }

    public function getName(): string
    {
        return $this->getData('name');
    }

    public function setName(string $name): static
    {
        return $this->setData('name', $name);
    }

    public function getPrice(): string
    {
        return $this->getData('price');
    }

    public function setPrice(string $price): static
    {
        return $this->setData('price', $price);
    }

    public function getShortDescription()
    {
        return $this->getData('description');
    }

    public function setShortDescription(string $description): static
    {
        return $this->setData('short_description', $description);
    }

    public function getQty(): int
    {
        return $this->getData('qty');
    }

    public function setQty(int $qty): static
    {
        return $this->setData('qty', $qty);
    }
}

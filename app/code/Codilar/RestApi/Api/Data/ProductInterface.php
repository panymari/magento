<?php

namespace Codilar\RestApi\Api\Data;

interface ProductInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): static;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): static;

    /**
     * @return string
     */
    public function getPrice(): string;

    /**
     * @param string $price
     * @return $this
     */
    public function setPrice(string $price): static;

    /**
     * @return mixed
     */
    public function getShortDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setShortDescription(string $description): static;

    /**
     * @return int
     */
    public function getQty(): int;

    /**
     * @param int $qty
     * @return $this
     */
    public function setQty(int $qty): static;
}

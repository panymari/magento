<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model\Config\Source;

use BlogExtension\Blog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;
use Magento\Framework\Option\ArrayInterface;

class Category implements ArrayInterface
{
    /** @var CategoryCollectionFactory */
    protected $categoryCollectionFactory;

    public function __construct(
        CategoryCollectionFactory $categoryCollectionFactory
    ) {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $categories = $this->categoryCollectionFactory->create();

        $options = [];

        foreach ($categories as $key => $value) {
            $options[] = ['label' => $value['title'], 'value' => $key];
        }

        return $options;
    }
}

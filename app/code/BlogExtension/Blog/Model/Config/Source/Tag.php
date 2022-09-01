<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model\Config\Source;

use BlogExtension\Blog\Model\ResourceModel\Tag\CollectionFactory as TagCollectionFactory;
use Magento\Framework\Option\ArrayInterface;

class Tag implements ArrayInterface
{
    /** @var TagCollectionFactory */
    protected $tagCollectionFactory;

    public function __construct(
        TagCollectionFactory $tagCollectionFactory
    ) {
        $this->tagCollectionFactory = $tagCollectionFactory;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $tags = $this->tagCollectionFactory->create();

        $options = [];

        foreach ($tags as $key => $value) {
            $options[] = ['label' => $value['title'], 'value' => $key];
        }

        return $options;
    }
}

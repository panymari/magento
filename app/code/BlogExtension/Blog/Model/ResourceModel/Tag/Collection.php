<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model\ResourceModel\Tag;

use BlogExtension\Blog\Model\Tag as TagModel;
use BlogExtension\Blog\Model\ResourceModel\Tag as TagResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(TagModel::class, TagResource::class);
    }
}

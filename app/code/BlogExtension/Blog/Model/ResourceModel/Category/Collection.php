<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model\ResourceModel\Category;

use BlogExtension\Blog\Model\Category as CategoryModel;
use BlogExtension\Blog\Model\ResourceModel\Category as CategoryResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(CategoryModel::class, CategoryResource::class);
    }
}

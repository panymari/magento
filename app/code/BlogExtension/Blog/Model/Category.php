<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model;

use BlogExtension\Blog\Model\ResourceModel\Category as CategoryResource;
use Magento\Framework\Model\AbstractModel;

class Category extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(CategoryResource::class);
    }
}

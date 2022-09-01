<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model;

use BlogExtension\Blog\Model\ResourceModel\Tag as TagResource;
use Magento\Framework\Model\AbstractModel;

class Tag extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(TagResource::class);
    }
}

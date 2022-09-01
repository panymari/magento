<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model;

use BlogExtension\Blog\Model\ResourceModel\Post as PostResource;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(PostResource::class);
    }
}

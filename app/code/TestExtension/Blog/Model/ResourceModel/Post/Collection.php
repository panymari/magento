<?php

declare(strict_types=1);

namespace TestExtension\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use TestExtension\Blog\Model\ResourceModel\Post as PostResource;
use TestExtension\Blog\Model\Post;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Post::class, PostResource::class);
    }
}

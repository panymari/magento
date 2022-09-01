<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model\ResourceModel\Post;

use BlogExtension\Blog\Model\Post as PostModel;
use BlogExtension\Blog\Model\ResourceModel\Post as PostResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(PostModel::class, PostResource::class);
    }
}

<?php

declare(strict_types=1);

namespace TestExtension\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('blog_page_post', 'post_id');
    }
}

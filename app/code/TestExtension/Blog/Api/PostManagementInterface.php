<?php

namespace TestExtension\Blog\Api;

use TestExtension\Blog\Api\Data\PostInterface;

interface PostManagementInterface
{
    /**
     * @return PostInterface
     */
    public function getEmptyObject(): PostInterface;

    /**
     * @param PostInterface $post
     * @return void
     */
    public function save(PostInterface $post): void;
}

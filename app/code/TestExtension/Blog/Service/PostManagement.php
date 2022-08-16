<?php

declare(strict_types=1);

namespace TestExtension\Blog\Service;

use Magento\Framework\Exception\AlreadyExistsException;
use TestExtension\Blog\Api\Data\PostInterface;
use TestExtension\Blog\Api\PostManagementInterface;
use TestExtension\Blog\Model\PostFactory;
use TestExtension\Blog\Model\ResourceModel\Post as PostResource;

class PostManagement implements PostManagementInterface
{
    private PostFactory $postFactory;

    private PostResource $resource;

    public function __construct(
        PostFactory $postFactory,
        PostResource $resource
    )
    {
        $this->postFactory = $postFactory;
        $this->resource = $resource;
    }

    /**
     * @return PostInterface
     */
    public function getEmptyObject(): PostInterface
    {
        return $this->postFactory->create();
    }

    /**
     * @param PostInterface $post
     * @return void
     * @throws AlreadyExistsException
     */
    public function save(PostInterface $post): void
    {
        $this->resource->save($post);
    }
}

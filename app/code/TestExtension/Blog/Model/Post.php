<?php

declare(strict_types=1);

namespace TestExtension\Blog\Model;

use Magento\Framework\Model\AbstractModel;
use TestExtension\Blog\Api\Data\PostInterface;
use TestExtension\Blog\Model\ResourceModel\Post as PostResource;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(PostResource::class);
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->getData('author');
    }

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor(string $author): static
    {
        return $this->setData('author', $author);
    }

    /**
     * @return int
     */
    public function getIsPost(): int
    {
        return $this->getData('is_post');
    }

    /**
     * @param int $isPost
     * @return $this
     */
    public function setIsPost(int $isPost): static
    {
        return $this->setData('is_post', $isPost);
    }

    /**
     * @return int
     */
    public function getPageId(): int
    {
        return $this->getData('page_id');
    }

    /**
     * @param int $pageId
     * @return $this
     */
    public function setPageId(int $pageId): static
    {
        return $this->setData('page_id', $pageId);
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->getData('post_id');
    }

    /**
     * @param int $postId
     * @return $this
     */
    public function setPostId(int $postId): static
    {
        return $this->setData('post_id', $postId);
    }

    /**
     * @return string
     */
    public function getPublishDate(): string
    {
        return $this->getData('publish_date');
    }

    /**
     * @param string $publishDate
     * @return $this
     */
    public function setPublishDate(string $publishDate): static
    {
        return $this->setData('publish_date', $publishDate);
    }
}

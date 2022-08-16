<?php

namespace TestExtension\Blog\Api\Data;

interface PostInterface
{
    /**
     * @return string
     */
    public function getAuthor(): string;

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor(string $author): static;

    /**
     * @return int
     */
    public function getIsPost(): int;

    /**
     * @param int $isPost
     * @return $this
     */
    public function setIsPost(int $isPost): static;

    /**
     * @return int
     */
    public function getPageId(): int;

    /**
     * @param int $pageId
     * @return $this
     */
    public function setPageId(int $pageId): static;

    /**
     * @return int
     */
    public function getPostId(): int;

    /**
     * @param int $postId
     * @return $this
     */
    public function setPostId(int $postId): static;

    /**
     * @return string
     */
    public function getPublishDate(): string;

    /**
     * @param string $publishDate
     * @return $this
     */
    public function setPublishDate(string $publishDate): static;
}

<?php

declare(strict_types=1);

namespace TestExtension\Blog\ViewModel;

use Magento\Cms\Api\Data\PageSearchResultsInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use TestExtension\Blog\Service\PostRepository;

class Blog implements ArgumentInterface
{
    private $serializer;

    private $postRepository;

    private $url;

    public function __construct(
        SerializerInterface $serializer,
        PostRepository      $postRepository,
        UrlInterface        $url
    ) {
        $this->serializer = $serializer;
        $this->postRepository = $postRepository;
        $this->url = $url;
    }

    public function getPosts(PageSearchResultsInterface $postsSearchResults): array
    {
        $result = [];

        foreach ($postsSearchResults->getItems() as $post) {
            $content = strip_tags($post->getContent());
            $shortContent = strlen($content) > 50 ? substr($content, 0, 500) . "..." : $content;

            $result[] = [
                "id" => $post->getId(),
                "title" => $post->getTitle(),
                "url" => $this->url->getUrl($post->getIdentifier()),
                "published_date" => $post->getCreationTime(),
                "content" => $shortContent,
                "author" => "Pany Maria"
            ];
        }
        return $result;
    }

    public function getPostsJson(): string
    {
        $postsSearchResults = $this->postRepository->get();

        return $this->serializer->serialize($this->getPosts($postsSearchResults));
    }
}

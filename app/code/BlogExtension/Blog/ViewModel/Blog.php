<?php

declare(strict_types=1);

namespace BlogExtension\Blog\ViewModel;

use BlogExtension\Blog\Block\Post\View;
use Magento\Framework\Serialize\SerializerInterface;

use Magento\Framework\UrlInterface;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Blog implements ArgumentInterface
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var UrlInterface
     */
    protected $url;

    /**
     * @var View
     */
    protected $view;

    public function __construct(
        SerializerInterface $serializer,
        UrlInterface        $url,
        View $view
    ) {
        $this->serializer = $serializer;
        $this->url = $url;
        $this->view = $view;
    }

    public function getPosts($postsSearchResults)
    {
        $result = [];

        foreach ($postsSearchResults as $post) {
            $content = strip_tags($post['content']);
            $shortContent = strlen($content) > 50 ? substr($content, 0, 500) . "..." : $content;

            $result[] = [
                "id" => $post['id'],
                "title" => $post['title'],
                "url" => $this->url->getUrl($post['url_key']),
                "published_date" => $post['created_at'],
                "content" => $shortContent,
                "author" => "Pany Maria"
            ];
        }

        return $result;
    }

    public function getPostsJson(): string
    {
        $posts = $this->view->getEnablePosts();

        return $this->serializer->serialize($this->getPosts($posts));
    }
}

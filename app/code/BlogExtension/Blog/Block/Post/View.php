<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Block\Post;

use BlogExtension\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;
use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;
use Magento\User\Model\ResourceModel\User\CollectionFactory as UserCollectionFactory;

class View extends Template
{
    /** @var PostCollectionFactory */
    protected $postCollectionFactory;

    /** @var UserCollectionFactory */
    protected $userCollectionFactory;

    /** @var StoreManagerInterface */
    protected $storeManager;

    public function __construct(
        Context $context,
        PostCollectionFactory $postCollectionFactory,
        UserCollectionFactory $userCollectionFactory,
        StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->postCollectionFactory = $postCollectionFactory;
        $this->userCollectionFactory = $userCollectionFactory;
        $this->storeManager = $storeManager;
    }

    public function getPosts()
    {
        $posts = $this->postCollectionFactory->create();
        return $posts;
    }

    public function getEnablePosts()
    {
        $posts = $this->postCollectionFactory->create();
        $filteredPosts = [];

        foreach ($posts as $post) {
            if ($post['status'] == 1) {
                $filteredPosts[] = $post;
            }
        }

        return$filteredPosts;
    }

//    public function getAuthorName($author_id)
//    {
//        $author = $this->userCollectionFactory->create()->addFieldToFilter('user_id', $author_id);
//        $author = $author->getFirstItem();
//        return $author->getFirstname() . ' ' . $author->getLastname();
//    }
//
//    public function getCoverUrl($coverName)
//    {
//        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
//        $coverUrl = $mediaUrl . 'blog/post/cover/' . $coverName;
//        return $coverUrl;
//    }

//    public function getPost()
//    {
//        /** @var Request $request */
//        $request = $this->getRequest();
//        $id = $request->getParam('id');
//        $post = $this->postCollectionFactory->create()
//            ->addFieldToFilter('id', $id)
//            ->getFirstItem();
//        return $post;
//    }
}

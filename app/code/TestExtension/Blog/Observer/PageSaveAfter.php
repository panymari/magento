<?php

declare(strict_types=1);

namespace TestExtension\Blog\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Exception\NoSuchEntityException;
use TestExtension\Blog\Api\PostManagementInterface;

class PageSaveAfter implements ObserverInterface
{
    private PostManagementInterface $postManagement;

    public function _construct(PostManagementInterface $postManagement)
    {
        $this->postManagement = $postManagement;
    }

    public function execute(Observer $observer)
    {
        $entity = $observer->getEvent()->getObject();
        $data = $entity->getData();

        $post = $this->postManagement->getEmptyObject();

//        $post->setAuthor($data['author']);
//        $post->setIsPost($data['is_post']);
//        $post->setPageId($data['page_id']);
//        $post->setPostId($data['post_id']);
//        $post->setPublishDate($data['publish_date']);


        $post->setData('author', $data['author']);
        $post->setData('is_post', $data['is_post']);
        $post->setData('post_id', $data['post_id']);
        $post->setData('page_id', $data['page_id']);
        $post->setData('publish_date', $data['publish_date']);

        $this->postManagement->save($post);
    }
}

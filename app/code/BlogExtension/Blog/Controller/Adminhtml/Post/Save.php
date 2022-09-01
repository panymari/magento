<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Controller\Adminhtml\Post;

use BlogExtension\Blog\Model\Post;
use BlogExtension\Blog\Model\PostFactory;
use BlogExtension\Blog\Model\ResourceModel\Post as PostResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action implements HttpPostActionInterface
{
    /** @var PostFactory */
    protected $postFactory;

    /** @var PostResource */
    protected $postResource;

    /**
     * Save constructor.
     * @param Context $context
     * @param PostFactory $postFactory
     * @param PostResource $postResource
     */
    public function __construct(
        Context $context,
        PostFactory $postFactory,
        PostResource $postResource,
    ) {
        $this->postFactory = $postFactory;
        $this->postResource = $postResource;
        parent::__construct($context);
    }

    /** @return Redirect */
    public function execute(): Redirect
    {
        try {
            $data = $this->getRequest()->getPostValue();

            /** @var Post $post */
            $post = $this->postFactory->create();

            if ($data['id']) {
                $this->postResource->load($post, $data['id']);
            } else {
                unset($data['id']);
            }

            $post->setData($data);

            if ($this->postResource->save($post)) {
                $this->messageManager->addSuccessMessage(__('The record has been saved.'));
            } else {
                $this->messageManager->addErrorMessage(__('The record was not saved.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        /** @var Redirect $redirect */
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $redirect->setPath('*/*');
    }
}

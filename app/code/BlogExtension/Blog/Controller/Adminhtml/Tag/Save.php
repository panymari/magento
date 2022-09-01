<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Controller\Adminhtml\Tag;

use BlogExtension\Blog\Model\Tag;
use BlogExtension\Blog\Model\TagFactory;
use BlogExtension\Blog\Model\ResourceModel\Tag as TagResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action implements HttpPostActionInterface
{
    /** @var TagFactory */
    protected $tagFactory;

    /** @var TagResource */
    protected $tagResource;

    /**
     * Save constructor.
     * @param Context $context
     * @param TagFactory $tagFactory
     * @param TagResource $tagResource
     */
    public function __construct(
        Context $context,
        TagFactory $tagFactory,
        TagResource $tagResource,
    ) {
        $this->tagFactory = $tagFactory;
        $this->tagResource = $tagResource;
        parent::__construct($context);
    }

    /** @return Redirect */
    public function execute(): Redirect
    {
        try {
            $data = $this->getRequest()->getPostValue();

            /** @var Tag $tag */
            $tag = $this->tagFactory->create();

            if ($data['id']) {
                $this->tagResource->load($tag, $data['id']);
            } else {
                unset($data['id']);
            }

            $tag->setData($data);

            if ($this->tagResource->save($tag)) {
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

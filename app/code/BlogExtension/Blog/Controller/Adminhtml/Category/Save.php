<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Controller\Adminhtml\Category;

use BlogExtension\Blog\Model\Category;
use BlogExtension\Blog\Model\CategoryFactory;
use BlogExtension\Blog\Model\ResourceModel\Category as CategoryResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action implements HttpPostActionInterface
{
    /** @var CategoryFactory */
    protected $categoryFactory;

    /** @var CategoryResource */
    protected $categoryResource;

    /**
     * Save constructor.
     * @param Context $context
     * @param CategoryFactory $categoryFactory
     * @param CategoryResource $categoryResource
     */
    public function __construct(
        Context $context,
        CategoryFactory $categoryFactory,
        CategoryResource $categoryResource,
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->categoryResource = $categoryResource;
        parent::__construct($context);
    }

    /** @return Redirect */
    public function execute(): Redirect
    {
        try {
            $data = $this->getRequest()->getPostValue();

            /** @var Category $category */
            $category = $this->categoryFactory->create();

            if ($data['id']) {
                $this->categoryResource->load($category, $data['id']);
            } else {
                unset($data['id']);
            }

            $category->setData($data);

            if ($this->categoryResource->save($category)) {
                $this->messageManager->addSuccessMessage(__('The category has been saved.'));
            } else {
                $this->messageManager->addErrorMessage(__('The category was not saved.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        /** @var Redirect $redirect */
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $redirect->setPath('*/*');
    }
}

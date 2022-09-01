<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Controller\Adminhtml\Tag;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 */
class Index implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    protected $pageFactory = false;

    /**
     * @param PageFactory $pageFactory
     */
    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        $resultPage= $this->pageFactory->create();
        $resultPage->setActiveMenu('BlogExtension_Blog::post');
        $resultPage->getConfig()->getTitle()->prepend(__('Posts List'));

        return $resultPage;
    }
}

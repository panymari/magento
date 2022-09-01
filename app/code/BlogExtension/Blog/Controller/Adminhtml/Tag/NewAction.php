<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Controller\Adminhtml\Tag;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class NewAction extends Action implements HttpGetActionInterface
{
    /** @var PageFactory */
    protected $pageFactory;

    /**
     * NewAction constructor
     *
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /** @return Page */
    public function execute(): Page
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu('BlogExtension_Blog::tag');
        $page->getConfig()->getTitle()->prepend(__('Add Tag'));
        return $page;
    }
}

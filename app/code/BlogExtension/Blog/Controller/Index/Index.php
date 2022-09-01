<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Controller\Index;

use BlogExtension\Blog\Block\Post\View;
use Magento\Cms\Model\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 */
class Index implements HttpGetActionInterface
{
    /**
     * @var ResultFactory
     */
    protected $resultFactory = false;

    protected $view;

    protected $pageFactory;

    /**
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        ResultFactory $resultFactory,
        View $view,
        PageFactory $pageFactory
    ) {
        $this->resultFactory = $resultFactory;
        $this->view = $view;
        $this->pageFactory = $pageFactory;
    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        return $resultPage;
    }
}

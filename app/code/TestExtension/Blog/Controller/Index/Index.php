<?php

declare(strict_types=1);

namespace TestExtension\Blog\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 */
class Index extends Action
{
    public function execute()
    {
        $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $page;
    }
}

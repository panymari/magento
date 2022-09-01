<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model\Config\Source;

use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Option\ArrayInterface;

class Store implements ArrayInterface
{
    /** @var StoreManagerInterface */
    protected $storeManager;

    public function __construct(
        StoreManagerInterface $storeManager
    ) {
        $this->_storeManager = $storeManager;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $storeManagerDataList = $this->_storeManager->getStores();

        $options = [];

        foreach ($storeManagerDataList as $key => $value) {
            $options[] = ['label' => $value['name'] . ' - ' . $value['code'], 'value' => $key];
        }

        return $options;
    }
}

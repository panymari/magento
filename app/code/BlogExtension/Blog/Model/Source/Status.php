<?php

declare(strict_types=1);

namespace BlogExtension\Blog\Model\Source;

class Status implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Retrieve status options array.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 1, 'label' => __('Enabled')],
            ['value' => 2, 'label' => __('Disabled')],
        ];
    }
}

<?php

namespace Mooore\WordpressIntegration\Block\Source;

use Magento\Framework\Data\OptionSourceInterface;

class IsEnabled implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => __('Enabled'),
                'value' => 1,
            ],
            [
                'label' => __('Disabled'),
                'value' => 0,
            ],
        ];
    }
}

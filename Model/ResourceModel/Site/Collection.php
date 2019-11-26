<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Model\ResourceModel\Site;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mooore\WordpressIntegration\Model\ResourceModel\Site;

class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Mooore\WordpressIntegration\Model\Site::class,
            Site::class
        );
    }
}

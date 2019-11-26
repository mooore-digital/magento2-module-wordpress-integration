<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Site extends AbstractDb
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('mooore_wordpressintegration_site', 'site_id');
    }
}

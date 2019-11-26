<?php


namespace Mooore\WordpressIntegration\Model\ResourceModel;

class Site extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
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

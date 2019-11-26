<?php


namespace Mooore\WordpressIntegration\Model\ResourceModel\Site;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
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
            \Mooore\WordpressIntegration\Model\ResourceModel\Site::class
        );
    }
}

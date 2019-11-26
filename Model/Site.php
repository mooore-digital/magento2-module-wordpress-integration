<?php


namespace Mooore\WordpressIntegration\Model;

use Magento\Framework\Api\DataObjectHelper;
use Mooore\WordpressIntegration\Api\Data\SiteInterface;
use Mooore\WordpressIntegration\Api\Data\SiteInterfaceFactory;

class Site extends \Magento\Framework\Model\AbstractModel
{

    protected $siteDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'mooore_wordpressintegration_site';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SiteInterfaceFactory $siteDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Mooore\WordpressIntegration\Model\ResourceModel\Site $resource
     * @param \Mooore\WordpressIntegration\Model\ResourceModel\Site\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        SiteInterfaceFactory $siteDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Mooore\WordpressIntegration\Model\ResourceModel\Site $resource,
        \Mooore\WordpressIntegration\Model\ResourceModel\Site\Collection $resourceCollection,
        array $data = []
    ) {
        $this->siteDataFactory = $siteDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve site model with site data
     * @return SiteInterface
     */
    public function getDataModel()
    {
        $siteData = $this->getData();
        
        $siteDataObject = $this->siteDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $siteDataObject,
            $siteData,
            SiteInterface::class
        );
        
        return $siteDataObject;
    }
}

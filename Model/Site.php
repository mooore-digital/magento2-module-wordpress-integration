<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Mooore\WordpressIntegration\Api\Data\SiteInterface;
use Mooore\WordpressIntegration\Api\Data\SiteInterfaceFactory;
use Mooore\WordpressIntegration\Model\ResourceModel\Site\Collection;

class Site extends AbstractModel
{
    private $siteDataFactory;

    private $dataObjectHelper;

    protected $_eventPrefix = 'mooore_wordpressintegration_site';

    /**
     * @param Context $context
     * @param Registry $registry
     * @param SiteInterfaceFactory $siteDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param ResourceModel\Site $resource
     * @param Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        SiteInterfaceFactory $siteDataFactory,
        DataObjectHelper $dataObjectHelper,
        ResourceModel\Site $resource,
        Collection $resourceCollection,
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

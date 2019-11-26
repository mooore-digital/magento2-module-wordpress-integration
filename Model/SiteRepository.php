<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Model;

use Exception;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Mooore\WordpressIntegration\Api\Data\SiteInterface;
use Mooore\WordpressIntegration\Api\Data\SiteInterfaceFactory;
use Mooore\WordpressIntegration\Api\Data\SiteSearchResultsInterfaceFactory;
use Mooore\WordpressIntegration\Api\SiteRepositoryInterface;
use Mooore\WordpressIntegration\Model\ResourceModel\Site as ResourceSite;
use Mooore\WordpressIntegration\Model\ResourceModel\Site\CollectionFactory as SiteCollectionFactory;

class SiteRepository implements SiteRepositoryInterface
{
    /**
     * @var DataObjectHelper
     */
    private $dataObjectHelper;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;
    /**
     * @var SiteSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;
    /**
     * @var DataObjectProcessor
     */
    private $dataObjectProcessor;
    /**
     * @var JoinProcessorInterface
     */
    private $extensionAttributesJoinProcessor;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @var ExtensibleDataObjectConverter
     */
    private $extensibleDataObjectConverter;
    /**
     * @var ResourceSite
     */
    private $resource;
    /**
     * @var SiteFactory
     */
    private $siteFactory;
    /**
     * @var SiteCollectionFactory
     */
    private $siteCollectionFactory;
    /**
     * @var SiteInterfaceFactory
     */
    private $dataSiteFactory;

    /**
     * @param ResourceSite $resource
     * @param SiteFactory $siteFactory
     * @param SiteInterfaceFactory $dataSiteFactory
     * @param SiteCollectionFactory $siteCollectionFactory
     * @param SiteSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceSite $resource,
        SiteFactory $siteFactory,
        SiteInterfaceFactory $dataSiteFactory,
        SiteCollectionFactory $siteCollectionFactory,
        SiteSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->siteFactory = $siteFactory;
        $this->siteCollectionFactory = $siteCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSiteFactory = $dataSiteFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(SiteInterface $site)
    {
        /* if (empty($site->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $site->setStoreId($storeId);
        } */

        $siteData = $this->extensibleDataObjectConverter->toNestedArray(
            $site,
            [],
            SiteInterface::class
        );

        $siteModel = $this->siteFactory->create()->setData($siteData);

        try {
            $this->resource->save($siteModel);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the site: %1',
                $exception->getMessage()
            ));
        }

        return $siteModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->siteCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            SiteInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($siteId)
    {
        return $this->delete($this->get($siteId));
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        SiteInterface $site
    ) {
        try {
            $siteModel = $this->siteFactory->create();
            $this->resource->load($siteModel, $site->getSiteId());
            $this->resource->delete($siteModel);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Site: %1',
                $exception->getMessage()
            ));
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function get($siteId)
    {
        $site = $this->siteFactory->create();
        $this->resource->load($site, $siteId);
        if (!$site->getId()) {
            throw new NoSuchEntityException(__('Site with id "%1" does not exist.', $siteId));
        }

        return $site->getDataModel();
    }
}

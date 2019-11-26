<?php


namespace Mooore\WordpressIntegration\Model;

use Mooore\WordpressIntegration\Model\ResourceModel\Site as ResourceSite;
use Mooore\WordpressIntegration\Model\ResourceModel\Site\CollectionFactory as SiteCollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Mooore\WordpressIntegration\Api\SiteRepositoryInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Mooore\WordpressIntegration\Api\Data\SiteSearchResultsInterfaceFactory;
use Mooore\WordpressIntegration\Api\Data\SiteInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class SiteRepository implements SiteRepositoryInterface
{

    protected $dataObjectHelper;

    private $storeManager;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;
    protected $resource;

    protected $siteFactory;

    protected $siteCollectionFactory;

    protected $dataSiteFactory;


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
    public function save(
        \Mooore\WordpressIntegration\Api\Data\SiteInterface $site
    ) {
        /* if (empty($site->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $site->setStoreId($storeId);
        } */
        
        $siteData = $this->extensibleDataObjectConverter->toNestedArray(
            $site,
            [],
            \Mooore\WordpressIntegration\Api\Data\SiteInterface::class
        );
        
        $siteModel = $this->siteFactory->create()->setData($siteData);
        
        try {
            $this->resource->save($siteModel);
        } catch (\Exception $exception) {
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
    public function get($siteId)
    {
        $site = $this->siteFactory->create();
        $this->resource->load($site, $siteId);
        if (!$site->getId()) {
            throw new NoSuchEntityException(__('Site with id "%1" does not exist.', $siteId));
        }

        return $site->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->siteCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Mooore\WordpressIntegration\Api\Data\SiteInterface::class
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
    public function delete(
        \Mooore\WordpressIntegration\Api\Data\SiteInterface $site
    ) {
        try {
            $siteModel = $this->siteFactory->create();
            $this->resource->load($siteModel, $site->getSiteId());
            $this->resource->delete($siteModel);
        } catch (\Exception $exception) {
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
    public function deleteById($siteId)
    {
        return $this->delete($this->get($siteId));
    }
}

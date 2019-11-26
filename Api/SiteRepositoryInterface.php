<?php


namespace Mooore\WordpressIntegration\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Mooore\WordpressIntegration\Api\Data\SiteInterface;

interface SiteRepositoryInterface
{
    /**
     * Save Site
     * @param \Mooore\WordpressIntegration\Api\Data\SiteInterface $site
     * @return \Mooore\WordpressIntegration\Api\Data\SiteInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(SiteInterface $site);

    /**
     * Retrieve Site
     * @param string $siteId
     * @return \Mooore\WordpressIntegration\Api\Data\SiteInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($siteId);

    /**
     * Retrieve Site matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Mooore\WordpressIntegration\Api\Data\SiteSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Site
     * @param \Mooore\WordpressIntegration\Api\Data\SiteInterface $site
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SiteInterface $site);

    /**
     * Delete Site by ID
     * @param string $siteId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($siteId);
}

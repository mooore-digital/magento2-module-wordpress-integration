<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Mooore\WordpressIntegration\Api\Data\SiteInterface;
use Mooore\WordpressIntegration\Api\Data\SiteSearchResultsInterface;

interface SiteRepositoryInterface
{
    /**
     * Save Site
     * @param SiteInterface $site
     * @return SiteInterface
     * @throws LocalizedException
     */
    public function save(SiteInterface $site): SiteInterface;

    /**
     * Retrieve Site
     * @param string $siteId
     * @return SiteInterface
     * @throws LocalizedException
     */
    public function get($siteId): SiteInterface;

    /**
     * Retrieve Site matching the specified criteria.
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Mooore\WordpressIntegration\Api\Data\SiteSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Site
     * @param SiteInterface $site
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(SiteInterface $site): bool;

    /**
     * Delete Site by ID
     * @param string $siteId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($siteId): bool;
}

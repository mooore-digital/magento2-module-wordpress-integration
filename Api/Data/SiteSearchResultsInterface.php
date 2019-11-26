<?php


namespace Mooore\WordpressIntegration\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SiteSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Site list.
     * @return \Mooore\WordpressIntegration\Api\Data\SiteInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Mooore\WordpressIntegration\Api\Data\SiteInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

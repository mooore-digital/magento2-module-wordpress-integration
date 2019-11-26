<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SiteSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Site list.
     * @return SiteInterface[]
     */
    public function getItems(): array;

    /**
     * Set name list.
     * @param SiteInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

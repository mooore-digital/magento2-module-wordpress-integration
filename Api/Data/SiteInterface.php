<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;
use Mooore\WordpressIntegration\Api\Data\SiteExtensionInterface;

interface SiteInterface extends ExtensibleDataInterface
{
    const BASEURL = 'baseurl';
    const NAME = 'name';
    const ENABLED = 'enabled';
    const SITE_ID = 'site_id';

    /**
     * Get site_id
     * @return string|null
     */
    public function getSiteId();

    /**
     * Set site_id
     * @param string $siteId
     * @return SiteInterface
     */
    public function setSiteId($siteId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return SiteInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Mooore\WordpressIntegration\Api\Data\SiteExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Mooore\WordpressIntegration\Api\Data\SiteExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SiteExtensionInterface $extensionAttributes);

    /**
     * Get baseurl
     * @return string|null
     */
    public function getBaseurl();

    /**
     * Set baseurl
     * @param string $baseurl
     * @return SiteInterface
     */
    public function setBaseurl($baseurl);

    /**
     * Get enabled
     * @return string|null
     */
    public function getEnabled();

    /**
     * Set enabled
     * @param string $enabled
     * @return SiteInterface
     */
    public function setEnabled($enabled);
}

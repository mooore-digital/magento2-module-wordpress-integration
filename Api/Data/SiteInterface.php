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
    const API_USERNAME = 'api_username';
    const API_PASSWORD = 'api_password';

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
    public function getName(): string;

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
    public function getExtensionAttributes(): ?SiteExtensionInterface;

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
    public function getBaseurl(): string;

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
    public function getEnabled(): bool;

    /**
     * Set enabled
     * @param string $enabled
     * @return SiteInterface
     */
    public function setEnabled($enabled);

    /**
     * Get api_username
     * @return string
     */
    public function getApiUsername(): ?string;

    /**
     * Set api_username
     * @param string $apiUsername
     * @return SiteInterface
     */
    public function setApiUsername(?string $apiUsername);

    /**
     * Get api_password
     * @return string
     */
    public function getApiPassword(): ?string;

    /**
     * Set api_password
     * @param string $apiPassword
     * @return SiteInterface
     */
    public function setApiPassword(?string $apiPassword);
}

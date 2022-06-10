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
    const REPLACE_MEDIA_URLS = 'replace_media_urls';
    const ENABLE_BLOG = 'enable_blog';
    const BLOG_PREFIX = 'blog_prefix';
    const BLOG_STORES = 'blog_stores';

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

    /**
    * Get replace_media_urls
    * @return bool
    */
    public function getReplaceMediaUrls(): ?bool;

    /**
    * Set replace_media_urls
    * @param bool $replaceMediaUrls
    * @return SiteInterface
    */
    public function setReplaceMediaUrls(?bool $replaceMediaUrls);

    /**
     * Get enable_blog
     * @return bool
     */
    public function getEnableBlog(): ?bool;

    /**
     * Set enable_blog
     * @param bool $enableBlog
     * @return SiteInterface
     */
    public function setEnableBlog(?bool $enableBlog);

    /**
     * Get blog_prefix
     * @return string
     */
    public function getBlogPrefix(): ?string;

    /**
     * Set blog_prefix
     * @param string $blogPrefix
     * @return SiteInterface
     */
    public function setBlogPrefix(?string $blogPrefix);

    /**
     * Get blog_stores
     * @return string
     */
    public function getBlogStores(): string;

    /**
     * Set blog_stores
     * @param string $blogStores
     * @return SiteInterface
     */
    public function setBlogStores(string $blogStores);
}

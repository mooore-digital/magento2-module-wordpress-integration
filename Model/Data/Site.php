<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Mooore\WordpressIntegration\Api\Data\SiteExtensionInterface;
use Mooore\WordpressIntegration\Api\Data\SiteInterface;

class Site extends AbstractExtensibleObject implements SiteInterface
{
    /**
     * Get site_id
     * @return string|null
     */
    public function getSiteId()
    {
        return $this->_get(self::SITE_ID);
    }

    /**
     * Set site_id
     * @param string $siteId
     * @return SiteInterface
     */
    public function setSiteId($siteId)
    {
        return $this->setData(self::SITE_ID, $siteId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName(): string
    {
        return (string) $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return SiteInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return SiteExtensionInterface|null
     */
    public function getExtensionAttributes(): ?SiteExtensionInterface
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param SiteExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SiteExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get baseurl
     * @return string|null
     */
    public function getBaseurl(): string
    {
        return (string) $this->_get(self::BASEURL);
    }

    /**
     * Set baseurl
     * @param string $baseurl
     * @return SiteInterface
     */
    public function setBaseurl($baseurl)
    {
        return $this->setData(self::BASEURL, $baseurl);
    }

    /**
     * Get enabled
     * @return string|null
     */
    public function getEnabled(): bool
    {
        return (bool) $this->_get(self::ENABLED);
    }

    /**
     * Set enabled
     * @param string $enabled
     * @return SiteInterface
     */
    public function setEnabled($enabled)
    {
        return $this->setData(self::ENABLED, $enabled);
    }

    /**
     * Get api_username
     * @return string
     */
    public function getApiUsername(): ?string
    {
        return $this->_get(self::API_USERNAME);
    }

    /**
     * Set api_username
     * @param string $apiUsername
     * @return SiteInterface
     */
    public function setApiUsername(?string $apiUsername)
    {
        return $this->setData(self::API_USERNAME, $apiUsername);
    }

    /**
     * Get api_password
     * @return string
     */
    public function getApiPassword(): ?string
    {
        return $this->_get(self::API_PASSWORD);
    }

    /**
     * Set api_password
     * @param string $apiPassword
     * @return SiteInterface
     */
    public function setApiPassword(?string $apiPassword)
    {
        return $this->setData(self::API_PASSWORD, $apiPassword);
    }

    /**
     * Get enable_blog
     * @return bool|null
     */
    public function getEnableBlog(): bool
    {
        return (bool) $this->_get(self::ENABLE_BLOG);
    }

    /**
     * Set enable_blog
     * @param bool $enableBlog
     * @return SiteInterface
     */
    public function setEnableBlog($enableBlog)
    {
        return $this->setData(self::ENABLE_BLOG, $enableBlog);
    }

    /**
     * - Add data rentation for route prefix + store views
     * - Add check at cronjob per site to check which blog is enabled
     * - Add check at cronjob for all stores to see which is applicable
     * - Create rewrite URLs
     */

     /**
     * Get blog_prefix
     * @return string
     */
    public function getBlogPrefix(): ?string
    {
        return $this->_get(self::BLOG_PREFIX);
    }

    /**
     * Set blog_prefix
     * @param string $apiPassword
     * @return SiteInterface
     */
    public function setBlogPrefix(?string $blogPrefix)
    {
        return $this->setData(self::BLOG_PREFIX, $blogPrefix);
    }

     /**
     * Get blog_stores
     * @return string
     */
    public function getBlogStores(): string
    {
        return $this->_get(self::BLOG_STORES);
    }

    /**
     * Set blog_stores
     * @param string $blogStores
     * @return SiteInterface
     */
    public function setBlogStores(string $blogStores)
    {
        return $this->setData(self::BLOG_STORES, $blogStores);
    }
}

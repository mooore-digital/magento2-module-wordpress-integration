<?php


namespace Mooore\WordpressIntegration\Model\Data;

use Mooore\WordpressIntegration\Api\Data\SiteInterface;

class Site extends \Magento\Framework\Api\AbstractExtensibleObject implements SiteInterface
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
     * @return \Mooore\WordpressIntegration\Api\Data\SiteInterface
     */
    public function setSiteId($siteId)
    {
        return $this->setData(self::SITE_ID, $siteId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Mooore\WordpressIntegration\Api\Data\SiteInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Mooore\WordpressIntegration\Api\Data\SiteExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Mooore\WordpressIntegration\Api\Data\SiteExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Mooore\WordpressIntegration\Api\Data\SiteExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get baseurl
     * @return string|null
     */
    public function getBaseurl()
    {
        return $this->_get(self::BASEURL);
    }

    /**
     * Set baseurl
     * @param string $baseurl
     * @return \Mooore\WordpressIntegration\Api\Data\SiteInterface
     */
    public function setBaseurl($baseurl)
    {
        return $this->setData(self::BASEURL, $baseurl);
    }

    /**
     * Get enabled
     * @return string|null
     */
    public function getEnabled()
    {
        return $this->_get(self::ENABLED);
    }

    /**
     * Set enabled
     * @param string $enabled
     * @return \Mooore\WordpressIntegration\Api\Data\SiteInterface
     */
    public function setEnabled($enabled)
    {
        return $this->setData(self::ENABLED, $enabled);
    }
}

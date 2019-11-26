<?php


namespace Mooore\WordpressIntegration\Controller\Adminhtml;

abstract class Site extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Mooore_WordpressIntegration::top_level';
    protected $_coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Mooore'), __('Mooore'))
            ->addBreadcrumb(__('Site'), __('Site'));
        return $resultPage;
    }
}

<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Registry;

abstract class Site extends Action
{
    const ADMIN_RESOURCE = 'Mooore_WordpressIntegration::top_level';

    protected $_coreRegistry;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param Page $resultPage
     * @return Page
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Mooore'), __('Mooore'))
            ->addBreadcrumb(__('Site'), __('Site'));

        return $resultPage;
    }
}

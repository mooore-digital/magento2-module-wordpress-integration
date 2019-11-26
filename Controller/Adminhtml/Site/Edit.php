<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Controller\Adminhtml\Site;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Mooore\WordpressIntegration\Model\Site;

class Edit extends \Mooore\WordpressIntegration\Controller\Adminhtml\Site
{

    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('site_id');
        $model = $this->_objectManager->create(Site::class);

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Site no longer exists.'));
                /** @var Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('mooore_wordpressintegration_site', $model);

        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Site') : __('New Site'),
            $id ? __('Edit Site') : __('New Site')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Sites'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __(
            'Edit Site %1',
            $model->getId()
        ) : __('New Site'));

        return $resultPage;
    }
}

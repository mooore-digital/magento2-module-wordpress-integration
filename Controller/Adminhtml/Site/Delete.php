<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Controller\Adminhtml\Site;

use Exception;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Mooore\WordpressIntegration\Controller\Adminhtml\Site;

class Delete extends Site
{
    /**
     * Delete action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('site_id');
        if (empty($id)) {
            $this->messageManager->addErrorMessage(__('We can\'t find a Site to delete.'));

            return $resultRedirect->setPath('*/*/');
        }

        try {
            $model = $this->_objectManager->create(\Mooore\WordpressIntegration\Model\Site::class);
            $model->load($id);
            $model->delete();

            $this->messageManager->addSuccessMessage(__('You deleted the Site.'));

            return $resultRedirect->setPath('*/*/');
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());

            return $resultRedirect->setPath('*/*/edit', ['site_id' => $id]);
        }
    }
}

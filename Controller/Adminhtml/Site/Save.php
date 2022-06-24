<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Controller\Adminhtml\Site;

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Mooore\WordpressIntegration\Model\Site;

class Save extends Action
{

    protected $dataPersistor;

    /**
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if (empty($data)) {
            return $resultRedirect->setPath('*/*/');
        }

        $id = $this->getRequest()->getParam('site_id');

        $model = $this->_objectManager->create(Site::class)->load($id);
        if (!$model->getId() && $id) {
            $this->messageManager->addErrorMessage(__('This Site no longer exists.'));
            return $resultRedirect->setPath('*/*/');
        }

        $data['blog_stores'] = is_array($data['blog_stores']) ? join(',', $data['blog_stores']) : $data['blog_stores'];

        $model->setData($data);

        try {
            $model->save();
            $this->messageManager->addSuccessMessage(__('You saved the Site.'));
            $this->dataPersistor->clear('mooore_wordpressintegration_site');

            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['site_id' => $model->getId()]);
            }
            return $resultRedirect->setPath('*/*/');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Site.'));
        }

        $this->dataPersistor->set('mooore_wordpressintegration_site', $data);
        return $resultRedirect->setPath('*/*/edit', ['site_id' => $this->getRequest()->getParam('site_id')]);
    }
}

<?php

namespace Adeelq\CoreLogFileReader\Controller\Adminhtml\Logs;

use Adeelq\CoreLogFileReader\Controller\Adminhtml\Logs;
use Adeelq\CoreLogFileReader\Helper\Logs as LogsHelper;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Exception;

class Clear extends Action
{
    const ADMIN_RESOURCE = Logs::ADMIN_RESOURCE;

    /**
     * @var LogsHelper
     */
    protected LogsHelper $logsHelper;

    /**
     * @param Context $context
     * @param LogsHelper $logsHelper
     */
    public function __construct(Context $context, LogsHelper $logsHelper)
    {
        parent::__construct($context);
        $this->logsHelper = $logsHelper;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $file = $this->getRequest()->getParam(LogsHelper::FILE_PARAM);
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('*/*/');
        try {
            if ($this->logsHelper->clearLogFile($file)) {
                $this->messageManager->addSuccessMessage(__('Log file has been cleared.'));
            } else {
                $this->messageManager->addErrorMessage(__('Unable to clear log file.'));
            }
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage(__('Error: %1', $e->getMessage()));
        }
        return $resultRedirect;
    }
}

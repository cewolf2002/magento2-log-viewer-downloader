<?php

namespace Adeelq\CoreLogFileReader\Controller\Adminhtml\Logs;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Adeelq\CoreLogFileReader\Helper\Logs as LogsHelper;
use Magento\Framework\Controller\ResultFactory;

class ClearBatch extends Action
{
    const ADMIN_RESOURCE = 'Adeelq_CoreLogFileReader::logs';

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

    public function execute()
    {
        $logs = $this->getRequest()->getParam('logs', []);
        $success = 0;
        $fail = 0;
        if (is_array($logs)) {
            foreach ($logs as $logFile) {
                if ($this->logsHelper->clearLogFile($logFile)) {
                    $success++;
                } else {
                    $fail++;
                }
            }
        }
        if ($success) {
            $this->messageManager->addSuccessMessage(__("%1 log(s) cleared.", $success));
        }
        if ($fail) {
            $this->messageManager->addErrorMessage(__("%1 log(s) failed to clear.", $fail));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('*/*/index');
        return $resultRedirect;
    }
}

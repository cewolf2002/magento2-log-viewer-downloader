<?php

namespace Adeelq\CoreLogFileReader\Controller\Adminhtml\Logs;

use Adeelq\CoreLogFileReader\Controller\Adminhtml\Logs;
use Magento\Backend\App\Action;


class Index extends Action
{
    /**
     * @inheritDoc
     */
    const ADMIN_RESOURCE = Logs::ADMIN_RESOURCE;

    public function execute()
    {
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
    }
}

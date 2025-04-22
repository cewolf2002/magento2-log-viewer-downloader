<?php

namespace Adeelq\CoreLogFileReader\Controller\Adminhtml\Logs;

use Adeelq\CoreLogFileReader\Controller\Adminhtml\Logs;
use Magento\Backend\App\Action;

use Adeelq\CoreLogFileReader\Helper\Logs as LogsHelper;

class Content extends Action
{
    /**
     * @inheritDoc
     */
    const ADMIN_RESOURCE = Logs::ADMIN_RESOURCE;

    public function execute()
    {
        // 實際內容依你的需求調整，這裡僅保留原本的功能
        // 你可能需要重構 view 的流程，或直接導向原本的頁面
        // 若有 block/view/phtml 對應，請確保 layout XML 正確
        // 這裡僅作為範例
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
    }
}

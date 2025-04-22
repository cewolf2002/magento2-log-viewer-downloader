<?php

namespace Adeelq\CoreLogFileReader\Block\Adminhtml;

use Magento\Backend\Block\Widget\Container;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Escaper;
use Adeelq\CoreLogFileReader\Helper\Logs as LogsHelper;

class Logs extends Container
{
    /**
     * @var Escaper
     */
    public Escaper $escaper;

    /**
     * @var LogsHelper
     */
    private LogsHelper $logsHelper;

    /**
     * @param Context $context
     * @param Escaper $escaper
     * @param LogsHelper $logsHelper
     * @param array $data
     */
    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    private \Magento\Framework\Data\Form\FormKey $_formKey;

    public function __construct(Context $context, Escaper $escaper, LogsHelper $logsHelper, \Magento\Framework\Data\Form\FormKey $formKey, array $data = [])
    {
        parent::__construct($context, $data);
        $this->escaper = $escaper;
        $this->logsHelper = $logsHelper;
        $this->_formKey = $formKey;
    }

    /**
     * @return LogsHelper
     */
    public function getLogHelper(): LogsHelper
    {
        return $this->logsHelper;
    }

    /**
     * 提供 logs.phtml 批次清空的 url
     */
    public function getBatchClearUrl(): string
    {
        return $this->logsHelper->getBatchClearUrl();
    }

    /**
     * 取得 CSRF 防護用 form_key
     */
    public function getFormKey()
    {
        return $this->_formKey->getFormKey();
    }
}

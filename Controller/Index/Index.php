<?php

namespace Elite\Vendors\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;
use Elite\Vendors\Helper\Data as HelperData;

class Index extends Action
{
    private $helperData;

    public function __construct(Context $context, HelperData $helperData)
    {
        $this->helperData = $helperData;
        parent::__construct($context);
    }

    public function execute()
    {
        $enabled = $this->helperData->getGeneralConfig('enable');
        $resultRedirect = $this->resultRedirectFactory->create();

        /**
         * If Module Is Disable Redirect To Homepage
         */
        if($enabled != 1) {
            $resultRedirect->setPath('*/*/');
        }

        /** @var Page $resultPage */
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}

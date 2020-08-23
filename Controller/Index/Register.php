<?php

namespace Elite\Vendors\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\Result\PageFactory;

class Register extends Action
{

    /** @var PageFactory $resultPageFactory */
    protected $resultPageFactory;

    /**
     * Result constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->resultPageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * The controller action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        /** @var Messages $messageBlock */
        $messageBlock = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Messages',
            'answer'
        );

        $messageBlock->addSuccess('You registered as a vendor');

        $resultPage->getLayout()->setChild(
            'content',
            $messageBlock->getNameInLayout(),
            'answer_alias'
        );

        return $resultPage;
    }
}

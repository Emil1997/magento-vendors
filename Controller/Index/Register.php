<?php

namespace Elite\Vendors\Controller\Index;

use Elite\Vendors\Model\Vendor;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\Result\PageFactory;
use Elite\Vendors\Model\VendorFactory;

class Register extends Action
{

    /** @var PageFactory $resultPageFactory */
    protected $resultPageFactory;

    /**
     * @var Vendor $vendorData
     */
    protected $vendorData;

    /**
     * Result constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        VendorFactory $vendorFactory
    )
    {
        $this->resultPageFactory = $pageFactory;
        $this->vendorData = $vendorFactory;
        parent::__construct($context);
    }

    /**
     * The controller action
     *
     * @return \Magento\Framework\View\Result\Page
     * @throws LocalizedException
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        /** @var Messages $messageBlock */
        $messageBlock = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Messages',
            'answer'
        );

        /**
         * Validate Request
         */
        $params = $this->validateParams();

        /**
         * Insert Data
         */
        $vendor = $this->vendorData->create()->addData([
            'business_name'     => $params['business_name'],
            'vat_number'        => $params['vat_number'],
            'email_address'     => $params['email_address'],
            'phone_number'      => $params['phone_number']
        ]);

        if ($vendor->save()) {
            $messageBlock->addSuccess('You registered as a vendor');
        } else {
            $messageBlock->addError('Something went wrong, Please try again later ...');
        }

        $resultPage->getLayout()->setChild(
            'content',
            $messageBlock->getNameInLayout(),
            'answer_alias'
        );

        return $resultPage;
    }

    /**
     * Validate
     * @return array
     * @throws LocalizedException
     */
    private function validateParams()
    {
        $request = $this->getRequest();

        if (trim($request->getParam('business_name')) === '') {
            throw new LocalizedException(__('Business Name is missing'));
        }

        if (trim($request->getParam('vat_number')) === '') {
            throw new LocalizedException(__('Vat Number is missing'));
        }

        if (false === \strpos($request->getParam('email_address'), '@')) {
            throw new LocalizedException(__('Invalid email address'));
        }

        if (trim($request->getParam('phone_number')) === '') {
            throw new LocalizedException(__('Invalid Phone Number'));
        }

        return $request->getParams();
    }
}

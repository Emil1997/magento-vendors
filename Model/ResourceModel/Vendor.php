<?php

namespace Elite\Vendors\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use \Magento\Framework\Model\ResourceModel\Db\Context;

class Vendor extends AbstractDb
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('elite_vendors_registration', 'id');
    }
}

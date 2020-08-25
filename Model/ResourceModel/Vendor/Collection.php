<?php

namespace Elite\Vendors\Model\ResourceModel\Vendor;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'elite_vendors_registration';
    protected $_eventObject = 'vendor_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Elite\Vendors\Model\Vendor', 'Elite\Vendors\Model\ResourceModel\Vendor');
    }
}

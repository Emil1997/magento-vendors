<?php

namespace Elite\Vendors\Model;

class Vendor extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{

    const CACHE_TAG = 'elite_vendors_registration';

    protected $_cacheTag = 'elite_vendors_registration';

    protected $_eventPrefix = 'elite_vendors_registration';

    protected function _construct()
    {
        $this->_init('Elite\Vendors\Model\ResourceModel\Vendor');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        return [];
    }
}

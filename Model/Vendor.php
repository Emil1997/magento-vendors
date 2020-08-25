<?php

namespace Elite\Vendors\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;

class Vendor extends AbstractModel implements IdentityInterface
{

    const CACHE_TAG = 'elite_vendors_registration';

    protected $_cacheTag = 'elite_vendors_registration';

    protected $_eventPrefix = 'elite_vendors_registration';

    protected function _construct()
    {
        $this->_init('Elite\Vendors\Model\ResourceModel\Vendor');
    }

    /**
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        return [];
    }
}

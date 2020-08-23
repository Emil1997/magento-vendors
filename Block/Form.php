<?php

namespace Elite\Vendors\Block;

use Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

class Form extends Template
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function getActionMethod()
    {
        return 'vendors/index/register';
    }
}

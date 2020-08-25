<?php

namespace Elite\Vendors\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        try {
            $table = $setup->getConnection()
                ->newTable($setup->getTable('elite_vendors_registration'))
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'VENDOR ID'
                )->addColumn(
                    'business_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'BUSINESS NAME'
                )->addColumn(
                    'vat_number',
                    \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                    null,
                    ['nullable' => false],
                    'VAT NUMBER'
                )->addColumn(
                    'email_address',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'EMAIL ADDRESS'
                )->addColumn(
                    'phone_number',
                    \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                    null,
                    ['nullable' => false],
                    'PHONE NUMBER'
                );
        } catch (\Zend_Db_Exception $e) {
            throw new \Exception($e->getMessage());
        }

        try {
            $setup->getConnection()->createTable($table);
        } catch (\Zend_Db_Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

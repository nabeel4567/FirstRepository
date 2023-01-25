<?php
declare(strict_types=1);

namespace SimpleTask\CustomCheckoutFields\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Add the new column
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $this->addDeliveryDateColumn($setup);

        $installer->endSetup();
    }

    /**
     * Add the column named delivery_date
     *
     * @param SchemaSetupInterface $setup
     *
     * @return void
     */
    private function addDeliveryDateColumn(SchemaSetupInterface $setup)
    {
        $deliveryDate = [
            'type' => Table::TYPE_DATE,
            'default' => NULL,
            'nullable' => true,
            'comment' => 'Delivery Date'
        ];

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_address'),
            'delivery_date',
            $deliveryDate
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('quote_address'),
            'delivery_date',
            $deliveryDate
        );
    }
}

<?php
declare(strict_types=1);

namespace SimpleTask\CustomTab\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 *Class Hero
 */
class Hero extends AbstractDb
{
    /**
     *
     */
    const MAIN_TABLE = 'customer_custom_data';
    /**
     *
     */
    const ID_FIELD_NAME = 'id';

    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}

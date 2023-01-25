<?php
declare(strict_types=1);

namespace SimpleTask\CustomTab\Model;

use Magento\Framework\Model\AbstractModel;

/**
 *Class Model Named as Hero
 */
class Hero extends AbstractModel
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel\Hero::class);
    }
}

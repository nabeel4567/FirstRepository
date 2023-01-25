<?php
declare(strict_types=1);

namespace SimpleTask\CustomTab\Model\ResourceModel\Hero;

use SimpleTask\CustomTab\Model\Hero;
use SimpleTask\CustomTab\Model\ResourceModel\Hero as HeroResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 *Collection Class
 */
class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(Hero::class, HeroResourceModel::class);
    }
}

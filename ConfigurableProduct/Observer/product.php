<?php
declare(strict_types=1);

namespace SimpleTask\ConfigurableProduct\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

/**
 *Class Products
 */
class product implements ObserverInterface
{
    /**
     * @param EventObserver $observer
     * @return $this
     */
    public function execute(EventObserver $observer): static
    {
        $productCollection = $observer->getEvent()->getCollection();
        $productCollection->addAttributeToFilter('type_id', ['neq' => "configurable"]);
        return $this;
    }
}

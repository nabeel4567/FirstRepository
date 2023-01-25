<?php
declare(strict_types=1);

namespace SimpleTask\PriceBelow\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

/**
 *Class PriceBelow
 */
class Pricebelow implements ObserverInterface
{
    /**
     * @param EventObserver $observer
     * @return $this|void
     */
    public function execute(EventObserver $observer)
    {
        $productCollection = $observer->getEvent()->getCollection();
        $productCollection->addAttributeToFilter('price', ['lteq' => 70]);
        return $this;
    }
}

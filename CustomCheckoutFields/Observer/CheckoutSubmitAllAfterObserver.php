<?php
declare(strict_types=1);

namespace SimpleTask\CustomCheckoutFields\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 *class checkout
 */
class CheckoutSubmitAllAfterObserver implements ObserverInterface
{
    /**
     * @param Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
        if (empty($order) || empty($quote)) {
            return $this;
        }

        $shippingAddress = $quote->getShippingAddress();
        if ($shippingAddress->getDeliveryDate()) {
            $orderShippingAddress = $order->getShippingAddress();
            $orderShippingAddress->setDeliveryDate(
                $shippingAddress->getDeliveryDate()
            )->save();
        }

        return $this;
    }
}

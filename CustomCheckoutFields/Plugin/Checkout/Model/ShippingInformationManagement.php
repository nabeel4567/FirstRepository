<?php
declare(strict_types=1);

namespace SimpleTask\CustomCheckoutFields\Plugin\Checkout\Model;

use Magento\Checkout\Api\Data\ShippingInformationInterface;

/**
 *class Shipping
 */
class ShippingInformationManagement
{
    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param $cartId
     * @param ShippingInformationInterface $addressInformation
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement   $subject,
                                                                $cartId,
        ShippingInformationInterface $addressInformation
    )
    {
        $shippingAddress = $addressInformation->getShippingAddress();
        $shippingExtensionAttributes = $shippingAddress->getExtensionAttributes();
        if (!empty($shippingExtensionAttributes)) {
            $shippingExtensionAttributes = $shippingAddress->getExtensionAttributes();
            if (!empty($shippingExtensionAttributes)) {
                $shippingAddress->setDeliveryDate($shippingExtensionAttributes->getDeliveryDate());
            }
        }
    }
}

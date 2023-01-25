<?php

declare(strict_types=1);

namespace SimpleTask\ChangeMessage\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;

/**
 *
 */
class UpdateMessage implements ObserverInterface
{
    /** @var ManagerInterface */
    protected ManagerInterface $messageManager;

    /**
     * @param ManagerInterface $managerInterface
     */
    public function __construct(
        ManagerInterface $managerInterface
    )
    {
        $this->messageManager = $managerInterface;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $messageCollection = $this->messageManager->getMessages(true);
        $cartLink = 'User Add the Product in cart';
        $this->messageManager->addSuccessMessage($messageCollection->getLastAddedMessage()->getText() . '  ' . $cartLink);
    }
}

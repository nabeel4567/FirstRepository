<?php
declare(strict_types=1);

namespace SimpleTask\CustomTab\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

/**
 *Class Index
 */
class Index implements ActionInterface
{
    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;
    /**
     * @var Context
     */
    protected Context $context;

    /**
     * @param PageFactory $resultPageFactory
     * @param Context $context
     */
    public function __construct( PageFactory $resultPageFactory, Context $context)
    {
        $this->context = $context;
        $this->resultPageFactory = $resultPageFactory;
    }


    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}


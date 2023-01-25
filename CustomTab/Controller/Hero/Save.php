<?php
declare(strict_types=1);

namespace SimpleTask\CustomTab\Controller\Hero;

use SimpleTask\CustomTab\Model\Hero;
use SimpleTask\CustomTab\Model\ResourceModel\Hero as HeroResourceModel;
use Exception;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;


/**
 *Class Save
 */
class Save implements HttpPostActionInterface
{
    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;
    /**
     * @var ManagerInterface
     */
    protected ManagerInterface $messageManager;
    /**
     * @var RedirectFactory
     */
    protected RedirectFactory $resultRedirectFactory;
    /**
     * @var Hero
     */
    private Hero $hero;
    /**
     * @var HeroResourceModel
     */
    private HeroResourceModel $heroResourceModel;

    /**
     * Add constructor.
     * @param Hero $hero
     * @param HeroResourceModel $heroResourceModel
     * @param RequestInterface $request
     * @param ManagerInterface $messageManager
     * @param RedirectFactory $resultRedirectFactory
     */
    public function __construct(
        Hero              $hero,
        HeroResourceModel $heroResourceModel,
        RequestInterface  $request,
        ManagerInterface  $messageManager,
        RedirectFactory   $resultRedirectFactory
    )
    {

        $this->hero = $hero;
        $this->heroResourceModel = $heroResourceModel;
        $this->request = $request;
        $this->messageManager = $messageManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    /**
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute(): ResultInterface|ResponseInterface|Redirect
    {
        $params = $this->request->getParams();
        $hero = $this->hero->setData($params);
        try {
            $this->heroResourceModel->save($hero);
            $this->messageManager->addSuccessMessage("Successfully added the Hero %1");
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage("Something went wrong.");
        }
        /* Redirect back to hero display page */
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('customer/account/');
        return $redirect;
    }
}

<?php
declare(strict_types=1);

namespace SimpleTask\CmsHeader\Setup;

use Exception;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 *
 */
class InstallData implements InstallDataInterface
{
    /**
     * @var BlockFactory
     */
    private BlockFactory $blockFactory;

    /**
     * @param BlockFactory $blockFactory
     */
    public function __construct(BlockFactory $blockFactory)
    {
        $this->blockFactory = $blockFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws Exception
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context): void
    {
        $cmsBlockData = [
            'title' => 'Custom Cms Block',
            'identifier' => 'custom_cms_block',
            'content' => 'Your Custom Text Here',
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];

        $this->blockFactory->create()->setData($cmsBlockData)->save();
    }
}

<?php
declare(strict_types=1);

namespace SimpleTask\CustomTab\Block;

use SimpleTask\CustomTab\Model\ResourceModel\Hero\Collection;
use Magento\Framework\View\Element\Template;

/**
 *
 */
class Display extends Template
{
    /**
     * @var Collection
     */
    private Collection $collection;

    /**
     * Display constructor.
     * @param Template\Context $context
     * @param Collection $collection
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Collection       $collection,
        array            $data = []
    )
    {
        $this->collection = $collection;
        parent::__construct($context, $data);
    }

    /**
     * @return Collection
     */
    public function getAllSuperHeroes(): Collection
    {
        return $this->collection;
    }

    /**
     * @return string
     */
    public function getPostUrl(): string
    {
        return $this->getUrl('foam/hero/save');
    }
}


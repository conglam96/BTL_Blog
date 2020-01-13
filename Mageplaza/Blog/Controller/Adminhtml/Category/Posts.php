<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Category;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Layout;
use Magento\Framework\View\Result\LayoutFactory;
use Mageplaza\Blog\Controller\Adminhtml\Category;
use Mageplaza\Blog\Model\CategoryFactory;
/**
 * Class Posts
 * @package Mageplaza\Blog\Controller\Adminhtml\Category
 */
class Posts extends Category
{
    /**
     * Result layout factory
     *
     * @var LayoutFactory
     */
    public $resultLayoutFactory;
    /**
     * Posts constructor.
     *
     * @param Context $context
     * @param Registry $coreRegistry
     * @param CategoryFactory $categoryFactory
     * @param LayoutFactory $resultLayoutFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        CategoryFactory $categoryFactory,
        LayoutFactory $resultLayoutFactory
    ) {
        $this->resultLayoutFactory = $resultLayoutFactory;
        parent::__construct($context, $coreRegistry, $categoryFactory);
    }
    /**
     * @return Layout
     */
    public function execute()
    {
        $this->initCategory(true);
        return $this->resultLayoutFactory->create();
    }
}
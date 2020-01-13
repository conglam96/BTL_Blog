<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Tag;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Layout;
use Magento\Framework\View\Result\LayoutFactory;
use Mageplaza\Blog\Controller\Adminhtml\Tag;
use Mageplaza\Blog\Model\TagFactory;
/**
 * Class Posts
 * @package Mageplaza\Blog\Controller\Adminhtml\Tag
 */
class Posts extends Tag
{
    /**
     * @var LayoutFactory
     */
    public $resultLayoutFactory;
    /**
     * Posts constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param LayoutFactory $resultLayoutFactory
     * @param TagFactory $postFactory
     */
    public function __construct(
        Context $context,
        Registry $registry,
        LayoutFactory $resultLayoutFactory,
        TagFactory $postFactory
    ) {
        $this->resultLayoutFactory = $resultLayoutFactory;
        parent::__construct($context, $registry, $postFactory);
    }
    /**
     * @return Layout
     */
    public function execute()
    {
        $this->initTag(true);
        return $this->resultLayoutFactory->create();
    }
}
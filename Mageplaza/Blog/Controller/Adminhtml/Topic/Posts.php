<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Topic;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Layout;
use Magento\Framework\View\Result\LayoutFactory;
use Mageplaza\Blog\Controller\Adminhtml\Topic;
use Mageplaza\Blog\Model\TopicFactory;
/**
 * Class Posts
 * @package Mageplaza\Blog\Controller\Adminhtml\Topic
 */
class Posts extends Topic
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
     * @param LayoutFactory $resultLayoutFactory
     * @param TopicFactory $postFactory
     * @param Registry $registry
     * @param Context $context
     */
    public function __construct(
        Context $context,
        Registry $registry,
        LayoutFactory $resultLayoutFactory,
        TopicFactory $postFactory
    ) {
        $this->resultLayoutFactory = $resultLayoutFactory;
        parent::__construct($context, $registry, $postFactory);
    }
    /**
     * @return Layout
     */
    public function execute()
    {
        $this->initTopic(true);
        return $this->resultLayoutFactory->create();
    }
}

<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Post;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Forward;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Mageplaza\Blog\Controller\Adminhtml\Post;
use Mageplaza\Blog\Model\PostFactory;
/**
 * Class Edit
 * @package Mageplaza\Blog\Controller\Adminhtml\Post
 */
class Duplicate extends Post
{
    /**
     * Redirect result factory
     *
     * @var ForwardFactory
     */
    public $resultForwardFactory;
    /**
     * Duplicate constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param PostFactory $postFactory
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        Registry $registry,
        PostFactory $postFactory,
        ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($postFactory, $registry, $context);
    }
    /**
     * @return Forward|ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        $resultForward->forward('edit');
        return $resultForward;
    }
}
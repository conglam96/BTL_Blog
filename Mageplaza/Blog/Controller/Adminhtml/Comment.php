<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Mageplaza\Blog\Model\CommentFactory;
/**
 * Class Comment
 * @package Mageplaza\Blog\Controller\Adminhtml
 */
abstract class Comment extends Action
{
    /** Authorization level of a basic admin session */
    const ADMIN_RESOURCE = 'Mageplaza_Blog::comment';
    /**
     * @var CommentFactory
     */
    public $commentFactory;
    /**
     * Core registry
     *
     * @var Registry
     */
    public $coreRegistry;
    /**
     * Comment constructor.
     *
     * @param CommentFactory $commentFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        CommentFactory $commentFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->commentFactory = $commentFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
    /**
     * @param bool $register
     *
     * @return bool|\Mageplaza\Blog\Model\Comment
     */
    protected function initComment($register = false)
    {
        $cmtId = $this->getRequest()->getParam("id");
        /** @var \Mageplaza\Blog\Model\Post $post */
        $comment = $this->commentFactory->create();
        if ($cmtId) {
            $comment->load($cmtId);
            if (!$comment->getId()) {
                $this->messageManager->addErrorMessage(__('This comment no longer exists.'));
                return false;
            }
        }
        if ($register) {
            $this->coreRegistry->register('mageplaza_blog_comment', $comment);
        }
        return $comment;
    }
}
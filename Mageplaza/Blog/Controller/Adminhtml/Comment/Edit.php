<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Comment;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\Blog\Controller\Adminhtml\Comment;
use Mageplaza\Blog\Model\CommentFactory;
use Mageplaza\Blog\Model\ResourceModel\Comment\CollectionFactory;
/**
 * Class Edit
 * @package Mageplaza\Blog\Controller\Adminhtml\Comment
 */
class Edit extends Comment
{
    /**
     * Page factory
     *
     * @var PageFactory
     */
    public $resultPageFactory;
    /**
     * Edit constructor.
     *
     * @param PageFactory $pageFactory
     * @param CommentFactory $commentFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        PageFactory $pageFactory,
        CommentFactory $commentFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->resultPageFactory = $pageFactory;
        parent::__construct($commentFactory, $coreRegistry, $context);
    }
    /**
     * @return \Magento\Backend\Model\View\Result\Page|Redirect|Page
     */
    public function execute()
    {
        /** @var \Mageplaza\Blog\Model\Comment $comment */
        $comment = $this->initComment();
        if (!$comment) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*');
            return $resultRedirect;
        }
        $data = $this->_session->getData('mageplaza_blog_comment_data', true);
        if (!empty($data)) {
            $comment->setData($data);
        }
        $this->coreRegistry->register('mageplaza_blog_comment', $comment);
        /** @var \Magento\Backend\Model\View\Result\Page|Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mageplaza_Blog::comment');
        $title = __('Edit Comment');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
}
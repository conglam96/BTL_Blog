<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Topic;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\Blog\Controller\Adminhtml\Topic;
use Mageplaza\Blog\Model\TopicFactory;
/**
 * Class Edit
 * @package Mageplaza\Blog\Controller\Adminhtml\Topic
 */
class Edit extends Topic
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
     * @param Context $context
     * @param Registry $registry
     * @param PageFactory $resultPageFactory
     * @param JsonFactory $resultJsonFactory
     * @param TopicFactory $topicFactory
     */
    public function __construct(
        Context $context,
        Registry $registry,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory,
        TopicFactory $topicFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $registry, $topicFactory);
    }
    /**
     * @return \Magento\Backend\Model\View\Result\Page|Redirect|Page
     */
    public function execute()
    {
        /** @var \Mageplaza\Blog\Model\Topic $topic */
        $topic = $this->initTopic();
        if (!$topic) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*');
            return $resultRedirect;
        }
        $data = $this->_session->getData('mageplaza_blog_topic_data', true);
        if (!empty($data)) {
            $topic->setData($data);
        }
        $this->coreRegistry->register('mageplaza_blog_topic', $topic);
        /** @var \Magento\Backend\Model\View\Result\Page|Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mageplaza_Blog::topic');
        $resultPage->getConfig()->getTitle()->set(__('Topics'));
        $title = $topic->getId() ? $topic->getName() : __('New Topic');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
}
<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Category;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\Blog\Helper\Data as HelperBlog;
/**
 * Class View
 * @package Mageplaza\Blog\Controller\Category
 */
class View extends Action
{
    /**
     * @var PageFactory
     */
    public $resultPageFactory;
    /**
     * @type ForwardFactory
     */
    protected $resultForwardFactory;
    /**
     * @var HelperBlog
     */
    public $helperBlog;
    /**
     * View constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param HelperBlog $helperBlog
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        HelperBlog $helperBlog
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->helperBlog = $helperBlog;
        parent::__construct($context);
    }
    /**
     * @return ResponseInterface|ResultInterface|Page
     * @throws NoSuchEntityException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $category = $this->helperBlog->getFactoryByType(HelperBlog::TYPE_CATEGORY)->create()->load($id);
        if (!$this->helperBlog->checkStore($category)) {
            return $this->_redirect('noroute');
        }
        $page = $this->resultPageFactory->create();
        $page->getConfig()->setPageLayout($this->helperBlog->getSidebarLayout());
        return $category->getEnabled() ? $page : $this->_redirect('noroute');
    }
}
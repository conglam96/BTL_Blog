<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Author;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\Blog\Helper\Data;
/**
 * Class View
 * @package Mageplaza\Blog\Controller\Author
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
     * @var Data
     */
    protected $_helperBlog;
    /**
     * View constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param Data $helperData
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        Data $helperData
    ) {
        $this->_helperBlog = $helperData;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }
    /**
     * @return $this|Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $page = $this->resultPageFactory->create();
        $page->getConfig()->setPageLayout($this->_helperBlog->getSidebarLayout());
        return ($id)
            ? $page
            : $this->_redirect('noroute');
    }
}
<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Month;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\Blog\Helper\Data;
/**
 * Class View
 * @package Mageplaza\Blog\Controller\Month
 */
class View extends Action
{
    /**
     * @var PageFactory
     */
    public $resultPageFactory;
    /**
     * @var Data
     */
    protected $_helperBlog;
    /**
     * View constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Data $helperData
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Data $helperData
    ) {
        $this->_helperBlog = $helperData;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    /**
     * @return Page
     */
    public function execute()
    {
        $page = $this->resultPageFactory->create();
        $page->getConfig()->setPageLayout($this->_helperBlog->getSidebarLayout());
        return $page;
    }
}
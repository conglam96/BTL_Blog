<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Import;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
/**
 * Class Edit
 * @package Mageplaza\Blog\Controller\Adminhtml\Import
 */
class Edit extends Action
{
    /**
     * @var PageFactory
     */
    public $resultPageFactory;
    /**
     * @var Registry
     */
    public $registry;
    /**
     * Edit constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $registry
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        Registry $registry
    ) {
        $this->registry = $registry;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    /**
     * @return \Magento\Backend\Model\View\Result\Page|Redirect|Page
     */
    public function execute()
    {
        $data = $this->_session->getData('mageplaza_blog_import_data');
        $this->registry->register('mageplaza_blog_import', $data);
        /** @var \Magento\Backend\Model\View\Result\Page|Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mageplaza_Blog::import');
        $resultPage->getConfig()->getTitle()->set(__('Import'));
        $resultPage->getConfig()->getTitle()->prepend('Import Settings');
        return $resultPage;
    }
}
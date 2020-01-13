<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Mageplaza\Blog\Model\CategoryFactory;
/**
 * Class Category
 * @package Mageplaza\Blog\Controller\Adminhtml
 */
abstract class Category extends Action
{
    /** Authorization level of a basic admin session */
    const ADMIN_RESOURCE = 'Mageplaza_Blog::category';
    /**
     * Blog Category Factory
     *
     * @var CategoryFactory
     */
    public $categoryFactory;
    /**
     * Core registry
     *
     * @var Registry
     */
    public $coreRegistry;
    /**
     * Category constructor.
     *
     * @param Context $context
     * @param Registry $coreRegistry
     * @param CategoryFactory $categoryFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        CategoryFactory $categoryFactory
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
    /**
     * @param bool $register
     * @param bool $isSave
     *
     * @return bool|\Mageplaza\Blog\Model\Category
     */
    public function initCategory($register = false, $isSave = false)
    {
        $categoryId = null;
        if ($this->getRequest()->getParam('id')) {
            $categoryId = (int) $this->getRequest()->getParam('id');
        } elseif ($this->getRequest()->getParam('category_id')) {
            $categoryId = (int) $this->getRequest()->getParam('category_id');
        }
        /** @var \Mageplaza\Blog\Model\Post $post */
        $category = $this->categoryFactory->create();
        if (!$this->getRequest()->getParam('duplicate') || !$isSave) {
            if ($categoryId) {
                $category->load($categoryId);
                if (!$category->getId()) {
                    $this->messageManager->addErrorMessage(__('This category no longer exists.'));
                    return false;
                }
            }
        }
        if ($register) {
            $this->coreRegistry->register('category', $category);
        }
        return $category;
    }
}
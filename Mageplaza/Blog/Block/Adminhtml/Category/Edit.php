<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Adminhtml\Category;
use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Block\Widget\Form\Container;
use Magento\Framework\Registry;
use Mageplaza\Blog\Model\Category;
/**
 * Class Edit
 * @package Mageplaza\Blog\Block\Adminhtml\Category
 */
class Edit extends Container
{
    /**
     * Core registry
     *
     * @var Registry
     */
    public $coreRegistry;
    /**
     * Edit constructor.
     *
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Registry $coreRegistry,
        Context $context,
        array $data = []
    ) {
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }
    /**
     * prepare the form
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Mageplaza_Blog';
        $this->_controller = 'adminhtml_category';
        parent::_construct();
        /** @var Category $category */
        $category = $this->coreRegistry->registry('category');
        if ($category->getId() && !$category->getDuplicate()) {
            $this->buttonList->add(
                'duplicate',
                [
                    'label'   => __('Duplicate'),
                    'class'   => 'duplicate',
                    'onclick' => sprintf("location.href = '%s';", $this->getDuplicateUrl()),
                ],
                -101
            );
        }
        $this->buttonList->remove('delete');
        $this->buttonList->remove('back');
        $this->buttonList->remove('reset');
        $this->buttonList->remove('save');
    }
    /**
     * @return string
     */
    protected function getDuplicateUrl()
    {
        /** @var Category $category */
        $category = $this->coreRegistry->registry('category');
        return $this->getUrl(
            '*/*/duplicate',
            ['id' => $category->getId(), 'duplicate' => true, 'parent' => $category->getParentId()]
        );
    }
}
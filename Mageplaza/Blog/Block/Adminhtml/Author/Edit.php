<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Adminhtml\Author;
use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Block\Widget\Form\Container;
use Magento\Framework\Registry;
use Mageplaza\Blog\Model\Author;
/**
 * Class Edit
 * @package Mageplaza\Blog\Block\Adminhtml\Author
 */
class Edit extends Container
{
    /**
     * @var Registry
     */
    public $coreRegistry;
    /**
     * Edit constructor.
     *
     * @param Context $context
     * @param Registry $coreRegistry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        array $data = []
    ) {
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }
    /**
     * Initialize Post edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'user_id';
        $this->_blockGroup = 'Mageplaza_Blog';
        $this->_controller = 'adminhtml_author';
        parent::_construct();
        $this->buttonList->add('save-and-continue', [
            'label'          => __('Save Change'),
            'class'          => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'button' => [
                        'event'  => 'saveAndContinueEdit',
                        'target' => '#edit_form'
                    ]
                ]
            ]
        ], -100);
        $this->buttonList->remove('back');
        $this->buttonList->remove('save');
    }
    /**
     * Retrieve text for header element depending on loaded Post
     *
     * @return string
     */
    public function getHeaderText()
    {
        /** @var Author $author */
        $author = $this->coreRegistry->registry('mageplaza_blog_author');
        if ($author->getId()) {
            return __("Edit Author '%1'", $this->escapeHtml($author->getName()));
        }
        return __('New Author');
    }
}
<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Adminhtml\Import;
use Magento\Backend\Block\Widget\Form\Container;
use Magento\Framework\Phrase;
/**
 * Class Edit
 * @package Mageplaza\Blog\Block\Adminhtml\Import
 */
class Edit extends Container
{
    /**
     * Internal constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->buttonList->remove('back');
        $this->buttonList->remove('reset');
        $this->buttonList->remove('save');
        $this->buttonList->add(
            'check-connection',
            [
                'label'          => __('Check Connection'),
                'class'          => 'primary',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => [
                            'target' => '#edit_form',
                        ]
                    ]
                ],
                'onclick'        => 'mpBlogImport.initImportCheckConnection();'
            ],
            -100
        );
        $this->_objectId = 'import_id';
        $this->_blockGroup = 'Mageplaza_Blog';
        $this->_controller = 'adminhtml_import';
    }
    /**
     * Get header text
     *
     * @return Phrase
     */
    public function getHeaderText()
    {
        return __('Import Setting');
    }
}
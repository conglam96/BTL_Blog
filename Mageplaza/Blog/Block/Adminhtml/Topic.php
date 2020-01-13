<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;
/**
 * Class Topic
 * @package Mageplaza\Blog\Block\Adminhtml
 */
class Topic extends Container
{
    /**
     * constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_topic';
        $this->_blockGroup = 'Mageplaza_Blog';
        $this->_headerText = __('Topics');
        $this->_addButtonLabel = __('Create New Topic');
        parent::_construct();
    }
}
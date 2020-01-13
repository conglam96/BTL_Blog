<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;
/**
 * Class Post
 * @package Mageplaza\Blog\Block\Adminhtml
 */
class Post extends Container
{
    /**
     * constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_post';
        $this->_blockGroup = 'Mageplaza_Blog';
        $this->_headerText = __('Posts');
        $this->_headerText = __('Posts');
        $this->_addButtonLabel = __('Create New Post');
        parent::_construct();
    }
}
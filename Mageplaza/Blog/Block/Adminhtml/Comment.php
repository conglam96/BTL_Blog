<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;
/**
 * Class Comment
 * @package Mageplaza\Blog\Block\Adminhtml
 */
class Comment extends Container
{
    /**
     * constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_comment';
        $this->_blockGroup = 'Mageplaza_Blog';
        $this->_addButtonLabel = __('New Comment');
        parent::_construct();
    }
}
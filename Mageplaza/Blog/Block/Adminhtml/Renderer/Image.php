<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Adminhtml\Renderer;
/**
 * Renderer image for admin form
 * Add media path to url
 *
 * Class Image
 * @package Mageplaza\Core\Block\Adminhtml\Renderer
 */
class Image extends \Mageplaza\Core\Block\Adminhtml\Renderer\Image
{
    /**
     * @return string
     */
    protected function _getDeleteCheckbox()
    {
        $html = '';
        if ($this->getValue()) {
            $label = __('Delete Image');
            $html .= '<span class="delete-image">';
            $html .= '<input style="margin: auto;" type="checkbox"' .
                     ' name="' .
                     $this->getName() .
                     '[delete]" value="1" class="checkbox"' .
                     ' id="' .
                     $this->getHtmlId() .
                     '_delete"' .
                     ($this->getDisabled() ? ' disabled="disabled"' : '') .
                     '/>';
            $html .= '<label for="' .
                     $this->getHtmlId() .
                     '_delete"' .
                     ($this->getDisabled() ? ' class="disabled"' : '') .
                     '> ' .
                     $label .
                     '</label>';
            $html .= $this->_getHiddenInput();
            $html .= '</span>';
        }
        return $html;
    }
}
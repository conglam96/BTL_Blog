<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
/**
 * Class ShowType
 * @package Mageplaza\Blog\Model\Config\Source\Widget
 */
class WidgetShowType implements ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'new', 'label' => __('New')],
            ['value' => 'category', 'label' => __('Category')]
        ];
    }
}
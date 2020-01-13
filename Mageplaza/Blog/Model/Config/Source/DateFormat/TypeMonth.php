<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\Config\Source\DateFormat;
use Magento\Framework\Option\ArrayInterface;
/**
 * Class TypeMonth
 * @package Mageplaza\Blog\Model\Config\Source\DateFormat
 */
class TypeMonth implements ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $dateArray = [];
        $type = ['F , Y', 'Y - m', 'm / Y', 'M  Y'];
        foreach ($type as $item) {
            $dateArray [] = [
                'value' => $item,
                'label' => $item . ' (' . date($item) . ')'
            ];
        }
        return $dateArray;
    }
}
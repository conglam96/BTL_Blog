<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\Config\Source\Import;
use Magento\Framework\Option\ArrayInterface;
/**
 * Class Behaviour
 * @package Mageplaza\Blog\Model\Config\Source\Import
 */
class Behaviour implements ArrayInterface
{
    const UPDATE  = "update";
    const REPLACE = "replace";
    const DELETE  = "delete";
    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        foreach ($this->toArray() as $value => $label) {
            $options[] = [
                'value' => $value,
                'label' => $label
            ];
        }
        return $options;
    }
    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            self::UPDATE  => __('Add / Update'),
            self::REPLACE => __('Replace'),
            self::DELETE  => __('Delete')
        ];
    }
}
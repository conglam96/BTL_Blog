<?php
/**
 
 */
namespace Mageplaza\Core\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
/**
 * Class AbstractSource
 * @package Mageplaza\Core\Model\Config\Source
 */
abstract class AbstractSource implements ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        foreach ($this->toArray() as $value => $label) {
            $options[] = compact('value', 'label');//tao 1 mang
        }
        return $options;
    }
    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    abstract public function toArray();
}
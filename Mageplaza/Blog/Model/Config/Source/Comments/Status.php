<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\Config\Source\Comments;
use Magento\Framework\Option\ArrayInterface;
/**
 * Class Status
 * @package Mageplaza\Blog\Model\Config\Source\Comments
 */
class Status implements ArrayInterface
{
    const APPROVED = 1;
    const SPAM     = 2;
    const PENDING  = 3;
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
            self::APPROVED => __('Approved'),
            self::PENDING  => __('Pending'),
            self::SPAM     => __('Spam')
        ];
    }
}
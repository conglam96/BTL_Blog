<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\ResourceModel\Traffic;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
/**
 * Class Collection
 * @package Mageplaza\Blog\Model\ResourceModel\Traffic
 */
class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\Blog\Model\Traffic', 'Mageplaza\Blog\Model\ResourceModel\Traffic');
    }
}
<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\ResourceModel\Like;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
/**
 * Class Collection
 * @package Mageplaza\Blog\Model\ResourceModel\Like
 */
class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\Blog\Model\Like', 'Mageplaza\Blog\Model\ResourceModel\Like');
    }
}
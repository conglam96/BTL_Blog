<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\ResourceModel\Comment;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
/**
 * Class Collection
 * @package Mageplaza\Blog\Model\ResourceModel\Comment
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'comment_id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\Blog\Model\Comment', 'Mageplaza\Blog\Model\ResourceModel\Comment');
    }
}
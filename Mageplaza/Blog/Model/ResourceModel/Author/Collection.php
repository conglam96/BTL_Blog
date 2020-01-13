<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\ResourceModel\Author;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
/**
 * Class Collection
 * @package Mageplaza\Blog\Model\ResourceModel\Author
 */
class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected $_idFieldName = 'user_id';
    /**
     * Construct
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\Blog\Model\Author', 'Mageplaza\Blog\Model\ResourceModel\Author');
    }
}
<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\ResourceModel\Tag;
use Magento\Framework\DB\Select;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Zend_Db_Select;
/**
 * Class Collection
 * @package Mageplaza\Blog\Model\ResourceModel\Tag
 */
class Collection extends AbstractCollection
{
    /**
     * ID Field Name
     *
     * @var string
     */
    protected $_idFieldName = 'tag_id';
    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'mageplaza_blog_tag_collection';
    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'tag_collection';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\Blog\Model\Tag', 'Mageplaza\Blog\Model\ResourceModel\Tag');
    }
    /**
     * Get SQL for get record count.
     * Extra GROUP BY strip added.
     *
     * @return Select
     */
    public function getSelectCountSql()
    {
        $countSelect = parent::getSelectCountSql();
        $countSelect->reset(Zend_Db_Select::GROUP);
        return $countSelect;
    }
    /**
     * @param string $valueField
     * @param string $labelField
     * @param array $additional
     *
     * @return array
     */
    protected function _toOptionArray($valueField = 'tag_id', $labelField = 'name', $additional = [])
    {
        return parent::_toOptionArray($valueField, $labelField, $additional);
    }
    /**
     * add if filter
     *
     * @param $tagIds
     *
     * @return $this
     */
    public function addIdFilter($tagIds)
    {
        $condition = '';
        if (is_array($tagIds)) {
            if (!empty($tagIds)) {
                $condition = ['in' => $tagIds];
            }
        } elseif (is_numeric($tagIds)) {
            $condition = $tagIds;
        } elseif (is_string($tagIds)) {
            $ids = explode(',', $tagIds);
            if (empty($ids)) {
                $condition = $tagIds;
            } else {
                $condition = ['in' => $ids];
            }
        }
        if ($condition != '') {
            $this->addFieldToFilter('tag_id', $condition);
        }
        return $this;
    }
}
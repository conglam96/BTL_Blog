<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model\ResourceModel\Topic;
use Magento\Framework\DB\Select;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Zend_Db_Select;
/**
 * Class Collection
 * @package Mageplaza\Blog\Model\ResourceModel\Topic
 */
class Collection extends AbstractCollection
{
    /**
     * ID Field Name
     *
     * @var string
     */
    protected $_idFieldName = 'topic_id';
    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'mageplaza_blog_topic_collection';
    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'topic_collection';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\Blog\Model\Topic', 'Mageplaza\Blog\Model\ResourceModel\Topic');
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
    protected function _toOptionArray($valueField = 'topic_id', $labelField = 'name', $additional = [])
    {
        return parent::_toOptionArray($valueField, $labelField, $additional);
    }
    /**
     * @param $topicIds
     *
     * @return $this
     */
    public function addIdFilter($topicIds)
    {
        $condition = '';
        if (is_array($topicIds)) {
            if (!empty($topicIds)) {
                $condition = ['in' => $topicIds];
            }
        } elseif (is_numeric($topicIds)) {
            $condition = $topicIds;
        } elseif (is_string($topicIds)) {
            $ids = explode(',', $topicIds);
            if (empty($ids)) {
                $condition = $topicIds;
            } else {
                $condition = ['in' => $ids];
            }
        }
        if ($condition != '') {
            $this->addFieldToFilter('topic_id', $condition);
        }
        return $this;
    }
}
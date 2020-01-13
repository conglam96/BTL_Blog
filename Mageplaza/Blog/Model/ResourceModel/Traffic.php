<?php
/**
 */
namespace Mageplaza\Blog\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
/**
 * Class Traffic
 * @package Mageplaza\Blog\Model\ResourceModel
 */
class Traffic extends AbstractDb
{
    /**
     * Define main table
     */
    public function _construct()
    {
        $this->_init('mageplaza_blog_post_traffic', 'traffic_id');
    }
}
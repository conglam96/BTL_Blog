<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model;
use Magento\Framework\Model\AbstractModel;
/**
 * Class Like
 * @package Mageplaza\Blog\Model
 */
class Like extends AbstractModel
{
    /**
     * Cache tag
     *
     * @var string
     */
    const CACHE_TAG = 'mageplaza_blog_comment_like';
    /**
     * Cache tag
     *
     * @var string
     */
    protected $_cacheTag = 'mageplaza_blog_comment_like';
    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'mageplaza_blog_comment_like';
    /**
     * @var string
     */
    protected $_idFieldName = 'like_id';
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\Like::class);
    }
    /**
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
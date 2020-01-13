<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Sidebar;
use Mageplaza\Blog\Block\Frontend;
use Mageplaza\Blog\Model\ResourceModel\Post\Collection;
/**
 * Class MostView
 * @package Mageplaza\Blog\Block\Sidebar
 */
class MostView extends Frontend
{
    /**
     * @return Collection
     */
    public function getMostViewPosts()
    {
        $collection = $this->helperData->getPostList();
        $collection->getSelect()
            ->joinLeft(
                ['traffic' => $collection->getTable('mageplaza_blog_post_traffic')],
                'main_table.post_id=traffic.post_id',
                'numbers_view'
            )
            ->order('numbers_view DESC')
            ->limit((int) $this->helperData->getBlogConfig('sidebar/number_mostview_posts') ?: 4);
        return $collection;
    }
    /**
     * @return Collection
     */
    public function getRecentPost()
    {
        $collection = $this->helperData->getPostList();
        $collection->getSelect()
            ->limit((int) $this->helperData->getBlogConfig('sidebar/number_recent_posts') ?: 4);
        return $collection;
    }
}
<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Widget;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Widget\Block\BlockInterface;
use Mageplaza\Blog\Block\Frontend;
use Mageplaza\Blog\Helper\Data;
use Mageplaza\Blog\Model\ResourceModel\Post\Collection;
/**
 * Class Posts
 * @package Mageplaza\Blog\Block\Widget
 */
class Posts extends Frontend implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = "widget/posts.phtml";
    /**
     * @return AbstractCollection|Collection
     */
    public function getCollection()
    {
        if ($this->hasData('show_type') && $this->getData('show_type') === 'category') {
            $collection = $this->helperData->getObjectByParam($this->getData('category_id'), null, Data::TYPE_CATEGORY)
                ->getSelectedPostsCollection();
            $this->helperData->addStoreFilter($collection);
        } else {
            $collection = $this->helperData->getPostList();
        }
        $collection->setPageSize($this->getData('post_count'));
        return $collection;
    }
    /**
     * @return Data
     */
    public function getHelperData()
    {
        return $this->helperData;
    }
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->getData('title');
    }
    /**
     * @param $code
     *
     * @return string
     */
    public function getBlogUrl($code)
    {
        return $this->helperData->getBlogUrl($code);
    }
}
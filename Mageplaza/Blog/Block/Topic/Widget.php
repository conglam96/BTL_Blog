<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Topic;
use Mageplaza\Blog\Block\Frontend;
use Mageplaza\Blog\Helper\Data;
/**
 * Class Widget
 * @package Mageplaza\Blog\Block\Topic
 */
class Widget extends Frontend
{
    /**
     * @return array|string
     */
    public function getTopicList()
    {
        $collection = $this->helperData->getObjectList(Data::TYPE_TOPIC);
        return $collection;
    }
    /**
     * @param $topic
     *
     * @return string
     */
    public function getTopicUrl($topic)
    {
        return $this->helperData->getBlogUrl($topic, Data::TYPE_TOPIC);
    }
}
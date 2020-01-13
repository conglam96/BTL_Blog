<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Author;
use Mageplaza\Blog\Block\Frontend;
use Mageplaza\Blog\Helper\Data;
/**
 * Class Widget
 * @package Mageplaza\Blog\Block\Author
 */
class Widget extends Frontend
{
    /**
     * @return mixed
     */
    public function getCurrentAuthor()
    {
        $authorId = $this->getRequest()->getParam('id');
        if ($authorId) {
            $author = $this->helperData->getObjectByParam($authorId, null, Data::TYPE_AUTHOR);
            if ($author && $author->getId()) {
                return $author;
            }
        }
        return null;
    }
}
<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Category;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Phrase;
use Mageplaza\Blog\Block\Adminhtml\Category\Tree;
use Mageplaza\Blog\Block\Frontend;
use Mageplaza\Blog\Helper\Data;
/**
 * Class Widget
 * @package Mageplaza\Blog\Block\Category
 */
class Widget extends Frontend
{
    /**
     * @return array|string
     */
    public function getTree()
    {
        $tree = ObjectManager::getInstance()->create(Tree::class);
        $tree = $tree->getTree(null, $this->store->getStore()->getId());
        return $tree;
    }
    /**
     * @param $tree
     *
     * @return Phrase|string
     */
    public function getCategoryTreeHtml($tree)
    {
        if (!$tree) {
            return __('No Categories.');
        }
        $html = '';
        foreach ($tree as $value) {
            if (!$value) {
                continue;
            }
            if ($value['enabled']) {
                $level = count(explode('/', ($value['path'])));
                $hasChild = isset($value['children']) && $level < 4;
                $html .= '<ul class="block-content menu-categories category-level' . $level . '" style="margin-bottom:0px;margin-top:8px;">';
                $html .= '<li class="category-item">';
                $html .= $hasChild ? '<i class="fa fa-plus-square-o mp-blog-expand-tree-' . $level . '"></i>' : '';
                $html .= '<a class="list-categories" href="' . $this->getCategoryUrl($value['url']) . '">';
                $html .= '<i class="fa fa-folder-open-o">&nbsp;&nbsp;</i>';
                $html .= ucfirst($value['text']) . '</a>';
                $html .= $hasChild ? $this->getCategoryTreeHtml($value['children']) : '';
                $html .= '</li>';
                $html .= '</ul>';
            }
        }
        return $html;
    }
    /**
     * @param $category
     *
     * @return string
     */
    public function getCategoryUrl($category)
    {
        return $this->helperData->getBlogUrl($category, Data::TYPE_CATEGORY);
    }
}
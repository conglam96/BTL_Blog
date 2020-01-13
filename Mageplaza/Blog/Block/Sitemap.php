<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block;
use Magento\Framework\Exception\LocalizedException;
/**
 * Class Sitemap
 * @package Mageplaza\Blog\Block
 */
class Sitemap extends Frontend
{
    /**
     * @return $this|void
     * @throws LocalizedException
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($breadcrumbs = $this->getLayout()->getBlock('breadcrumbs')) {
            $breadcrumbs->addCrumb('sitemap', [
                'label' => __('Site Map'),
                'title' => __('Site Map')
            ]);
        }
    }
    /**
     * @param bool $meta
     *
     * @return array
     */
    public function getBlogTitle($meta = false)
    {
        $blogTitle = parent::getBlogTitle($meta);
        if ($meta) {
            $blogTitle[] = __('Site Map');
        } else {
            $blogTitle = __('Site Map');
        }
        return $blogTitle;
    }
}
<?php
/**
 * 
 */
namespace Mageplaza\Blog\Plugin;
use Infortis\UltraMegamenu\Block\Navigation;
/**
 * Class InfortisTopmenu
 * @package Mageplaza\Blog\Plugin
 */
class InfortisTopmenu
{
    /**
     * @param Navigation $topmenu
     * @param $html
     *
     * @return string
     */
    public function afterRenderCategoriesMenuHtml(Navigation $topmenu, $html)
    {
        $html .= $topmenu->getLayout()
            ->createBlock(\Mageplaza\Blog\Block\Frontend::class)
            ->setTemplate('Mageplaza_Blog::position/topmenuinfortis.phtml')
            ->toHtml();
        return $html;
    }
}
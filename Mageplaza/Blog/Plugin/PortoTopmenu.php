<?php
/**
 * 
 */
namespace Mageplaza\Blog\Plugin;
/**
 * Class PortoTopmenu
 * @package Mageplaza\Blog\Plugin
 */
class PortoTopmenu
{
    /**
     * @param \Smartwave\Megamenu\Block\Topmenu $topmenu
     * @param $html
     *
     * @return string
     */
    public function afterGetMegamenuHtml(\Smartwave\Megamenu\Block\Topmenu $topmenu, $html)
    {
        $html .= $topmenu->getLayout()
            ->createBlock(\Mageplaza\Blog\Block\Frontend::class)
            ->setTemplate('Mageplaza_Blog::position/topmenuporto.phtml')
            ->toHtml();
        return $html;
    }
}
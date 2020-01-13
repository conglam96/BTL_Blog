<?php
/**
 * 
 */
namespace Mageplaza\Blog\Block\Html;
use Magento\Framework\View\Element\Html\Link;
use Magento\Framework\View\Element\Template\Context;
use Mageplaza\Blog\Helper\Data;
/**
 * Class Footer
 * @package Mageplaza\Blog\Block\Html
 */
class Footer extends Link
{
    /**
     * @var Data
     */
    public $helper;
    /**
     * @var string
     */
    protected $_template = 'Mageplaza_Blog::html\footer.phtml';
    /**
     * Footer constructor.
     *
     * @param Context $context
     * @param Data $helper
     * @param array $data
     */
    public function __construct(
        Context $context,
        Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }
    /**
     * @return string
     */
    public function getHref()
    {
        return $this->helper->getBlogUrl('');
    }
    /**
     * @return string
     */
    public function getLabel()
    {
        if ($this->helper->getBlogConfig('general/name') == "") {
            return __("Blog");
        }
        return $this->helper->getBlogConfig('general/name');
    }
    /**
     * @return string
     */
    public function getHtmlSiteMapUrl()
    {
        return $this->helper->getBlogUrl('sitemap');
    }
}
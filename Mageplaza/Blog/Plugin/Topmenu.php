<?php
/**
 * 
 */
namespace Mageplaza\Blog\Plugin;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Data\Tree\Node;
use Magento\Framework\Data\TreeFactory;
use Mageplaza\Blog\Helper\Data;
/**
 * Class Topmenu
 * @package Mageplaza\Blog\Plugin
 */
class Topmenu
{
    /**
     * @var Data
     */
    protected $helper;
    /**
     * @var TreeFactory
     */
    protected $treeFactory;
    /**
     * @var RequestInterface
     */
    protected $request;
    /**
     * Topmenu constructor.
     *
     * @param Data $helper
     * @param TreeFactory $treeFactory
     * @param RequestInterface $request
     */
    public function __construct(
        Data $helper,
        TreeFactory $treeFactory,
        RequestInterface $request
    ) {
        $this->helper = $helper;
        $this->treeFactory = $treeFactory;
        $this->request = $request;
    }
    /**
     * @param \Magento\Theme\Block\Html\Topmenu $subject
     * @param string $outermostClass
     * @param string $childrenWrapClass
     * @param int $limit
     *
     * @return array
     */
    public function beforeGetHtml(
        \Magento\Theme\Block\Html\Topmenu $subject,
        $outermostClass = '',
        $childrenWrapClass = '',
        $limit = 0
    ) {
        if ($this->helper->isEnabled() && $this->helper->getBlogConfig('general/toplinks')) {
            $subject->getMenu()
                ->addChild(
                    new Node(
                        $this->getMenuAsArray(),
                        'id',
                        $this->treeFactory->create()
                    )
                );
        }
        return [$outermostClass, $childrenWrapClass, $limit];
    }
    /**
     * @return array
     */
    private function getMenuAsArray()
    {
        $identifier = trim($this->request->getPathInfo(), '/');
        $routePath = explode('/', $identifier);
        $routeSize = sizeof($routePath);
        return [
            'name'       => $this->helper->getBlogConfig('general/name') ?: __('Blog'),
            'id'         => 'mpblog-node',
            'url'        => $this->helper->getBlogUrl(''),
            'has_active' => ($identifier == 'mpblog/post/index'),
            'is_active'  => ('mpblog' == array_shift($routePath)) && ($routeSize == 3)
        ];
    }
}
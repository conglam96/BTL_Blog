<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Mageplaza\Blog\Model\PostFactory;
/**
 * Class Post
 * @package Mageplaza\Blog\Controller\Adminhtml
 */
abstract class Post extends Action
{
    /** Authorization level of a basic admin session */
    const ADMIN_RESOURCE = 'Mageplaza_Blog::post';
    /**
     * Post Factory
     *
     * @var PostFactory
     */
    public $postFactory;
    /**
     * Core registry
     *
     * @var Registry
     */
    public $coreRegistry;
    /**
     * Post constructor.
     *
     * @param PostFactory $postFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        PostFactory $postFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->postFactory = $postFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
    /**
     * @param bool $register
     *
     * @return bool|\Mageplaza\Blog\Model\Post
     */
    protected function initPost($register = false, $isSave = false)
    {
        $postId = (int) $this->getRequest()->getParam('id');
        $duplicate = $this->getRequest()->getParam('duplicate');
        /** @var \Mageplaza\Blog\Model\Post $post */
        $post = $this->postFactory->create();
        if ($postId) {
            if (!$isSave || !$duplicate) {
                $post->load($postId);
                if (!$post->getId()) {
                    $this->messageManager->addErrorMessage(__('This post no longer exists.'));
                    return false;
                }
            }
        }
        if (!$post->getAuthorId()) {
            $post->setAuthorId($this->_auth->getUser()->getId());
        }
        if ($register) {
            $this->coreRegistry->register('mageplaza_blog_post', $post);
        }
        return $post;
    }
}
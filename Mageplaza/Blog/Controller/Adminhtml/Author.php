<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Mageplaza\Blog\Model\AuthorFactory;
/**
 * Class Author
 * @package Mageplaza\Blog\Controller\Adminhtml
 */
abstract class Author extends Action
{
    /** Authorization level of a basic admin session */
    const ADMIN_RESOURCE = 'Mageplaza_Blog::author';
    /**
     * @var Registry
     */
    public $coreRegistry;
    /**
     * @var AuthorFactory
     */
    public $authorFactory;
    /**
     * Author constructor.
     *
     * @param Context $context
     * @param Registry $coreRegistry
     * @param AuthorFactory $authorFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        AuthorFactory $authorFactory
    ) {
        $this->authorFactory = $authorFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
    /**
     * @return bool|\Mageplaza\Blog\Model\Author
     */
    public function initAuthor()
    {
        $user = $this->_auth->getUser();
        $userId = $user->getId();
        /** @var \Mageplaza\Blog\Model\Author $author */
        $author = $this->authorFactory->create()
            ->load($userId);
        if (!$author->getId()) {
            $author = $this->authorFactory->create()->setId($user->getId());
        }
        return $author;
    }
}
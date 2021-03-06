<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Author;
use Exception;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Mageplaza\Blog\Controller\Adminhtml\Author;
use Mageplaza\Blog\Helper\Image;
use Mageplaza\Blog\Model\AuthorFactory;
use RuntimeException;
/**
 * Class Save
 * @package Mageplaza\Blog\Controller\Adminhtml\Author
 */
class Save extends Author
{
    /**
     * @var Image
     */
    protected $imageHelper;
    /**
     * Save constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param AuthorFactory $authorFactory
     * @param Image $imageHelper
     */
    public function __construct(
        Context $context,
        Registry $registry,
        AuthorFactory $authorFactory,
        Image $imageHelper
    ) {
        $this->imageHelper = $imageHelper;
        parent::__construct($context, $registry, $authorFactory);
    }
    /**
     * @return ResponseInterface|Redirect|ResultInterface
     * @throws FileSystemException
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data = $this->getRequest()->getPost('author')) {
            /** @var \Mageplaza\Blog\Model\Author $author */
            $author = $this->initAuthor();
            $this->imageHelper->uploadImage($data, 'image', Image::TEMPLATE_MEDIA_TYPE_AUTH, $author->getImage());
            if (!empty($data)) {
                $author->addData($data);
            }
            $this->_eventManager->dispatch(
                'mageplaza_blog_author_prepare_save',
                ['author' => $author, 'request' => $this->getRequest()]
            );
            try {
                $author->save();
                $this->messageManager->addSuccess(__('The Author has been saved.'));
                $this->_getSession()->setData('mageplaza_blog_author_data', false);
                if ($this->getRequest()->getParam('back')) {
                    $resultRedirect->setPath('mageplaza_blog/*/edit', ['_current' => true]);
                } else {
                    $resultRedirect->setPath('mageplaza_blog/*/');
                }
                return $resultRedirect;
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Author.'));
            }
            $this->_getSession()->setData('mageplaza_blog_author_data', $data);
            $resultRedirect->setPath('mageplaza_blog/*/edit', ['_current' => true]);
            return $resultRedirect;
        }
        $resultRedirect->setPath('mageplaza_blog/*/');
        return $resultRedirect;
    }
}
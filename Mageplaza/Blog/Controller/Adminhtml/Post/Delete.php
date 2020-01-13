<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Post;
use Exception;
use Magento\Framework\Controller\Result\Redirect;
use Mageplaza\Blog\Controller\Adminhtml\Post;
/**
 * Class Delete
 * @package Mageplaza\Blog\Controller\Adminhtml\Post
 */
class Delete extends Post
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $this->postFactory->create()
                    ->load($id)
                    ->delete();
                $this->messageManager->addSuccess(__('The Post has been deleted.'));
            } catch (Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $resultRedirect->setPath('mageplaza_blog/*/edit', ['id' => $id]);
                return $resultRedirect;
            }
        } else {
            $this->messageManager->addError(__('Post to delete was not found.'));
        }
        $resultRedirect->setPath('mageplaza_blog/*/');
        return $resultRedirect;
    }
}
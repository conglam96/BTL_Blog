<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Comment;
use Exception;
use Magento\Framework\Controller\Result\Redirect;
use Mageplaza\Blog\Controller\Adminhtml\Comment;
/**
 * Class Delete
 * @package Mageplaza\Blog\Controller\Adminhtml\Comment
 */
class Delete extends Comment
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $this->commentFactory->create()
                    ->load($id)
                    ->delete();
                $this->messageManager->addSuccess(__('The Comment has been deleted.'));
            } catch (Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $resultRedirect->setPath('mageplaza_blog/*/edit', ['id' => $id]);
                return $resultRedirect;
            }
        } else {
            $this->messageManager->addError(__('Comment to delete was not found.'));
        }
        $resultRedirect->setPath('mageplaza_blog/*/');
        return $resultRedirect;
    }
}
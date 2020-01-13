<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Tag;
use Exception;
use Magento\Framework\Controller\Result\Redirect;
use Mageplaza\Blog\Controller\Adminhtml\Tag;
/**
 * Class Delete
 * @package Mageplaza\Blog\Controller\Adminhtml\Tag
 */
class Delete extends Tag
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $this->tagFactory->create()
                    ->load($id)
                    ->delete();
                $this->messageManager->addSuccess(__('The Tag has been deleted.'));
            } catch (Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $resultRedirect->setPath('mageplaza_blog/*/edit', ['id' => $id]);
                return $resultRedirect;
            }
        } else {
            $this->messageManager->addError(__('Tag to delete was not found.'));
        }
        $resultRedirect->setPath('mageplaza_blog/*/');
        return $resultRedirect;
    }
}
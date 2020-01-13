<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Category;
use Exception;
use Magento\Framework\Controller\Result\Redirect;
use Mageplaza\Blog\Controller\Adminhtml\Category;
/**
 * Class Delete
 * @package Mageplaza\Blog\Controller\Adminhtml\Category
 */
class Delete extends Category
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $this->categoryFactory->create()
                    ->load($id)
                    ->delete();
                $this->messageManager->addSuccess(__('The Blog Category has been deleted.'));
                $resultRedirect->setPath('mageplaza_blog/*/');
                return $resultRedirect;
            } catch (Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                $resultRedirect->setPath('mageplaza_blog/*/edit', ['id' => $id]);
                return $resultRedirect;
            }
        }
        // display error message
        $this->messageManager->addError(__('Blog Category to delete was not found.'));
        // go to grid
        $resultRedirect->setPath('mageplaza_blog/*/');
        return $resultRedirect;
    }
}
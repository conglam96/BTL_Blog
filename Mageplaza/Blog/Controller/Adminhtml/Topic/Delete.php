<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Topic;
use Exception;
use Magento\Framework\Controller\Result\Redirect;
use Mageplaza\Blog\Controller\Adminhtml\Topic;
/**
 * Class Delete
 * @package Mageplaza\Blog\Controller\Adminhtml\Topic
 */
class Delete extends Topic
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $this->topicFactory->create()
                    ->load($id)
                    ->delete();
                $this->messageManager->addSuccess(__('The Topic has been deleted.'));
            } catch (Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $resultRedirect->setPath('mageplaza_blog/*/edit', ['id' => $id]);
                return $resultRedirect;
            }
        } else {
            $this->messageManager->addError(__('Topic to delete was not found.'));
        }
        $resultRedirect->setPath('mageplaza_blog/*/');
        return $resultRedirect;
    }
}
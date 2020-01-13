<?php
/**
 * 
 */
namespace Mageplaza\Blog\Controller\Adminhtml\Import;
use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Mageplaza\Blog\Helper\Data as BlogHelper;
use RuntimeException;
/**
 * Class Import
 * @package Mageplaza\Blog\Controller\Adminhtml\Import
 */
class Validate extends Action
{
    /**
     * @var BlogHelper
     */
    public $blogHelper;
    /**
     * Validate constructor.
     *
     * @param Context $context
     * @param BlogHelper $blogHelper
     */
    public function __construct(
        Context $context,
        BlogHelper $blogHelper
    ) {
        $this->blogHelper = $blogHelper;
        parent::__construct($context);
    }
    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        try {
            $connect = mysqli_connect($data['host'], $data['user_name'], $data['password'], $data['database']);
            $importName = $data['import_name'];
            /** @var Session */
            $this->_getSession()->setData('mageplaza_blog_import_data', $data);
            $result = ['import_name' => $importName, 'status' => 'ok'];
            mysqli_close($connect);
            return $this->getResponse()->representJson(BlogHelper::jsonEncode($result));
        } catch (LocalizedException $e) {
            $result = ['import_name' => $data["import_name"], 'status' => 'false'];
            return $this->getResponse()->representJson(BlogHelper::jsonEncode($result));
        } catch (RuntimeException $e) {
            $result = ['import_name' => $data["import_name"], 'status' => 'false'];
            return $this->getResponse()->representJson(BlogHelper::jsonEncode($result));
        } catch (Exception $e) {
            $result = ['import_name' => $data["import_name"], 'status' => 'false'];
            return $this->getResponse()->representJson(BlogHelper::jsonEncode($result));
        }
    }
}
<?php
/**
 
 */
namespace Mageplaza\Blog\Model\ResourceModel;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Mageplaza\Blog\Helper\Data;
/**
 * Class Author
 * @package Mageplaza\Blog\Model\ResourceModel
 */
class Author extends AbstractDb
{
    /**
     * @var Data
     */
    public $helperData;
    /**
     * @var DateTime
     */
    public $dateTime;
    /**
     * @inheritdoc
     */
    protected $_isPkAutoIncrement = false;
    /**
     * Author constructor.
     *
     * @param Context $context
     * @param Data $helperData
     * @param DateTime $dateTime
     */
    public function __construct(
        Context $context,
        Data $helperData,
        DateTime $dateTime
    ) {
        $this->helperData = $helperData;
        $this->dateTime = $dateTime;
        parent::__construct($context);
    }
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('mageplaza_blog_author', 'user_id');
    }
    /**
     * @inheritdoc
     * @throws LocalizedException
     */
    protected function _beforeSave(AbstractModel $object)
    {
        $object->setUrlKey(
            $this->helperData->generateUrlKey($this, $object, $object->getUrlKey() ?: $object->getName())
        );
        if (!$object->isObjectNew()) {
            $timeStamp = $this->dateTime->gmtDate();
            $object->setUpdatedAt($timeStamp);
        }
        return $this;
    }
}
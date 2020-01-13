<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use Mageplaza\Blog\Helper\Data;
/**
 * Class Author
 * @package Mageplaza\Blog\Model
 */
class Author extends AbstractModel
{
    /**
     * @inheritdoc
     */
    const CACHE_TAG = 'mageplaza_blog_author';
    /**
     * @var Data
     */
    protected $helperData;
    /**
     * Author constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param Data $helperData
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        Data $helperData,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->helperData = $helperData;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\Author::class);
    }
    /**
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->helperData->getBlogUrl($this, Data::TYPE_AUTHOR);
    }
}
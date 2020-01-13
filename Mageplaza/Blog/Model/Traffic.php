<?php
/**
 * 
 */
namespace Mageplaza\Blog\Model;
use Magento\Framework\Model\AbstractModel;
/**
 * Class Traffic
 * @package Mageplaza\Blog\Model
 */
class Traffic extends AbstractModel
{
    /**
     * Define resource model
     */
    public function _construct()
    {
        $this->_init(ResourceModel\Traffic::class);
    }
}
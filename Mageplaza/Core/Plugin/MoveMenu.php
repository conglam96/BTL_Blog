<?php
/**
 
 */
namespace Mageplaza\Core\Plugin;
use Magento\Backend\Model\Menu\Builder\AbstractCommand;
use Mageplaza\Core\Helper\AbstractData;
/**
 * Class MoveMenu
 * @package Mageplaza\Core\Plugin
 */
class MoveMenu
{
    const MAGEPLAZA_CORE = 'Mageplaza_Core::menu';
    /**
     * @var AbstractData
     */
    protected $helper;
    /**
     * MoveMenu constructor.
     *
     * @param AbstractData $helper
     */
    public function __construct(AbstractData $helper)
    {
        $this->helper = $helper;
    }
    /**
     * @param AbstractCommand $subject
     * @param $itemParams
     *
     * @return mixed
     */
    public function afterExecute(AbstractCommand $subject, $itemParams)
    {
        if ($this->helper->getConfigGeneral('menu')) {
            if (strpos($itemParams['id'], 'Mageplaza_') !== false//tim kiem vi tri ki tu
                && isset($itemParams['parent'])
                && strpos($itemParams['parent'], 'Mageplaza_') === false) {
                $itemParams['parent'] = self::MAGEPLAZA_CORE;
            }
        } elseif ((isset($itemParams['id']) && $itemParams['id'] === self::MAGEPLAZA_CORE)
                || (isset($itemParams['parent']) && $itemParams['parent'] === self::MAGEPLAZA_CORE)) {
            $itemParams['removed'] = true;
        }
        return $itemParams;
    }
}
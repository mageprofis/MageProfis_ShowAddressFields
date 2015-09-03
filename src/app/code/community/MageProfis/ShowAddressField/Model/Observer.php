<?php
/**
  * MageProfis_ShowAddressField
  *
  * @category  MageProfis
  * @package   MageProfis_ShowAddressField
  * @author    Mathis Klooss <mathis.klooss@mage-profis.de>
  * @copyright 2015 Mage-Profis GmbH (http://www.mage-profis.de/). All rights served.
  */
class MageProfis_ShowAddressField_Model_Observer
{

    const XML_PATH_CUSTOMER_SHOWADDRESSFIELD = 'customer/create_account/show_address_field';
    const VARIEN_OBJECT_SHOWADDRESSFIELD     = 'show_address_fields';

    /**
     * @mageEvent core_block_abstract_prepare_layout_before
     * @param Varien_Object $event
     * @return void
     */
    public function eventShowAddressField($event)
    {
        $block = $event->getBlock();
        /* @var $block Mage_Customer_Block_Form_Register */
        if ($block instanceof Mage_Customer_Block_Form_Register) {
            if (Mage::getStoreConfigFlag(self::XML_PATH_CUSTOMER_SHOWADDRESSFIELD)) {
                $block->setData(self::VARIEN_OBJECT_SHOWADDRESSFIELD, true);
            } else {
                $block->setData(self::VARIEN_OBJECT_SHOWADDRESSFIELD, false);
            }
        }
    }
}

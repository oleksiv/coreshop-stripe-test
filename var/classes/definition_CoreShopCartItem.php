<?php 

/** 
* Inheritance: no
* Variants: no


Fields Summary: 
- product [manyToOneRelation]
- quantity [numeric]
- defaultUnitQuantity [numeric]
- isGiftItem [checkbox]
- digitalProduct [checkbox]
- unitDefinition [coreShopProductUnitDefinition]
- totalGross [coreShopMoney]
- totalNet [coreShopMoney]
- itemPriceNet [coreShopMoney]
- itemPriceGross [coreShopMoney]
- itemRetailPriceNet [coreShopMoney]
- itemRetailPriceGross [coreShopMoney]
- itemDiscountNet [coreShopMoney]
- itemDiscountGross [coreShopMoney]
- itemDiscountPriceNet [coreShopMoney]
- itemDiscountPriceGross [coreShopMoney]
- itemWholesalePrice [coreShopMoney]
- itemTax [coreShopMoney]
- taxes [fieldcollections]
- pimcoreAdjustmentTotalNet [coreShopMoney]
- pimcoreAdjustmentTotalGross [coreShopMoney]
- adjustmentItems [fieldcollections]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 2,
   'name' => 'CoreShopCartItem',
   'description' => NULL,
   'creationDate' => NULL,
   'modificationDate' => 1595933402,
   'userOwner' => 0,
   'userModification' => 0,
   'parentClass' => 'CoreShop\\Component\\Core\\Model\\CartItem',
   'implementsInterfaces' => NULL,
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => false,
   'allowVariants' => NULL,
   'showVariants' => false,
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => NULL,
     'height' => NULL,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'permissions' => NULL,
     'childs' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
         'fieldtype' => 'tabpanel',
         'border' => false,
         'tabPosition' => 'top',
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => NULL,
         'width' => NULL,
         'height' => NULL,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => NULL,
         'datatype' => 'layout',
         'permissions' => NULL,
         'childs' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Info',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Info',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'CoreShopProduct',
                  ),
                ),
                 'pathFormatterClass' => '',
                 'name' => 'product',
                 'title' => 'Product',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => '',
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => NULL,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'quantity',
                 'title' => 'Quantity',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => '',
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => NULL,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'defaultUnitQuantity',
                 'title' => 'Default Unit Quantity',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                 'fieldtype' => 'checkbox',
                 'defaultValue' => 0,
                 'queryColumnType' => 'tinyint(1)',
                 'columnType' => 'tinyint(1)',
                 'phpdocType' => 'boolean',
                 'name' => 'isGiftItem',
                 'title' => 'Is Gift Item',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                 'fieldtype' => 'checkbox',
                 'defaultValue' => 0,
                 'queryColumnType' => 'tinyint(1)',
                 'columnType' => 'tinyint(1)',
                 'phpdocType' => 'boolean',
                 'name' => 'digitalProduct',
                 'title' => 'Digital Product',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              5 => 
              CoreShop\Bundle\ProductBundle\CoreExtension\ProductUnitDefinition::__set_state(array(
                 'fieldtype' => 'coreShopProductUnitDefinition',
                 'phpdocType' => '\\CoreShop\\Component\\Product\\Model\\ProductUnitDefinitionInterface',
                 'allowEmpty' => false,
                 'name' => 'unitDefinition',
                 'title' => 'Unit Definition',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
            ),
             'locked' => false,
             'icon' => NULL,
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Numbers',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Numbers',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'totalGross',
                 'title' => 'Total Gross',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              1 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'totalNet',
                 'title' => 'Total Net',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              2 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemPriceNet',
                 'title' => 'Item Price Net',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              3 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemPriceGross',
                 'title' => 'Item Price Gross',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              4 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemRetailPriceNet',
                 'title' => 'Retail Price Net',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              5 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemRetailPriceGross',
                 'title' => 'Retail Price Gross',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              6 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemDiscountNet',
                 'title' => 'Item Discount Net',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              7 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemDiscountGross',
                 'title' => 'Item Discount Gross',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              8 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemDiscountPriceNet',
                 'title' => 'Item Discount Price Net',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              9 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemDiscountPriceGross',
                 'title' => 'Item Discount Price Gross',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              10 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemWholesalePrice',
                 'title' => 'Wholesale Price',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              11 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'itemTax',
                 'title' => 'Item Tax',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              12 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                 'fieldtype' => 'fieldcollections',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                 'allowedTypes' => 
                array (
                  0 => 'CoreShopTaxItem',
                ),
                 'lazyLoading' => true,
                 'maxItems' => '',
                 'disallowAddRemove' => false,
                 'disallowReorder' => false,
                 'collapsed' => false,
                 'collapsible' => false,
                 'border' => false,
                 'name' => 'taxes',
                 'title' => 'Taxes',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              13 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'pimcoreAdjustmentTotalNet',
                 'title' => 'Adjustments Total Net',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              14 => 
              CoreShop\Bundle\MoneyBundle\CoreExtension\Money::__set_state(array(
                 'fieldtype' => 'coreShopMoney',
                 'width' => '',
                 'defaultValue' => NULL,
                 'phpdocType' => 'int',
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'name' => 'pimcoreAdjustmentTotalGross',
                 'title' => 'Adjustments Total Gross',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              15 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                 'fieldtype' => 'fieldcollections',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                 'allowedTypes' => 
                array (
                  0 => 'CoreShopAdjustment',
                ),
                 'lazyLoading' => true,
                 'maxItems' => '',
                 'disallowAddRemove' => false,
                 'disallowReorder' => false,
                 'collapsed' => false,
                 'collapsible' => false,
                 'border' => false,
                 'name' => 'adjustmentItems',
                 'title' => 'Adjustments',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
            ),
             'locked' => false,
             'icon' => NULL,
          )),
        ),
         'locked' => false,
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
   'icon' => NULL,
   'previewUrl' => NULL,
   'group' => 'CoreShop',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => NULL,
   'compositeIndices' => 
  array (
  ),
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'dao' => NULL,
));

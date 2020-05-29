<?php

namespace Magenteiro\ProductAttribute\Setup;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{ 
    /** @var \Magento\Eav\Setup\EavSetup  */
    protected $eavSetupFactory;

    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(
        \Magento\Framework\Setup\ModuleDataSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context

    ) {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'shape',
            [
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Shape',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => null,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => false,
                'unique' => false,
    //              'apply_to' => 'simple',
                'system' => 0,
                'group' => 'General',
    //              'option' => ['values' => [""]]
            ]
        );

        $setup->endSetup();
    }
}
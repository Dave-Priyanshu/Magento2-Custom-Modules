<?php
namespace Priyanshu\HideCategoryElements\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Model\Category;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class AddEnableHideCategoryElementsAttribute implements DataPatchInterface
{
    private $moduleDataSetup;
    private $eavSetupFactory;
    
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }
    
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            Category::ENTITY,
            'enable_hide_category_elements',
            [
                'type'         => 'int',
                'label'        => 'Enable Hide Category Elements',
                'input'        => 'select',
                'source'       => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'required'     => false,
                'global'       => ScopedAttributeInterface::SCOPE_STORE,
                'group'        => 'General',
                'visible'      => true,
                'user_defined' => true,
                'sort_order'   => 110,
            ]
        );
        
        $this->moduleDataSetup->getConnection()->endSetup();
        return $this;
    }
    
    public static function getDependencies()
    {
        return [];
    }
    
    public function getAliases()
    {
        return [];
    }
}

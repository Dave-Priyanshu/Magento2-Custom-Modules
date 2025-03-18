<?php
namespace Priyanshu\ShowChildCategories\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Model\Category;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class AddMaxChildDepthAttribute implements DataPatchInterface
{
    /** @var ModuleDataSetupInterface */
    private $moduleDataSetup;
    
    /** @var EavSetupFactory */
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
            'max_child_depth',
            [
                'type'         => 'int',
                'label'        => 'Maximum Child Depth',
                'input'        => 'text', // you can also use a "number" input if desired
                'default'      => '0',
                'required'     => false,
                'global'       => ScopedAttributeInterface::SCOPE_STORE,
                'group'        => 'General Information',
                'visible'      => true,
                'user_defined' => true,
                'sort_order'   => 112,
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

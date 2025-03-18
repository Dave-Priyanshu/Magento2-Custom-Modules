<?php
namespace Priyanshu\HideCategoryElements\Block\Category;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;

class HideElements extends Template
{
    protected $registry;
    
    public function __construct(
        Template\Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }
    
    public function getCurrentCategory()
    {
        return $this->registry->registry('current_category');
    }
    
    public function getHideElementsCss()
    {
        $css = '';
        $category = $this->getCurrentCategory();
        if ($category) {
            $hideElements = $category->getData('hide_category_elements');
            if ($hideElements) {
                // The attribute returns a comma-separated list of values.
                $elements = explode(',', $hideElements);
                foreach ($elements as $element) {
                    $element = trim($element);
                    switch ($element) {
                        case 'page_title_heading':
                            $css .= '#page-title-heading { display: none; }' . "\n";
                            break;
                        case 'category_image':
                            $css .= '.category-view .category-image { display: none; }' . "\n";
                            break;
                        case 'category_description':
                            $css .= '.category-view .category-description { display: none; }' . "\n";
                            break;
                    }
                }
            }
        }
        return $css;
    }
}

<?php
namespace Priyanshu\HideCategoryElements\Model\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class HideElementsOptions extends AbstractSource
{
    /**
     * Retrieve all options array
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('Hide Page Title'), 'value' => 'page_title_heading'],
                ['label' => __('Hide Category Image'), 'value' => 'category_image'],
                ['label' => __('Hide Category Description'), 'value' => 'category_description']
            ];
        }
        return $this->_options;
    }
}

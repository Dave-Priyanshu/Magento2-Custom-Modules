<?php
namespace Priyanshu\OgTags\Block\Category;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;
use Magento\Store\Model\StoreManagerInterface;

class Category extends Template
{
    protected $registry;
    protected $_storeManager;

    public function __construct(
        Template\Context $context,
        Registry $registry,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function getCategory()
    {
        return $this->registry->registry('current_category');
    }

    public function getCategoryName()
    {
        return $this->getCategory() ? $this->getCategory()->getName() : '';
    }

    public function getCategoryUrl()
    {
        return $this->getCategory() ? $this->getCategory()->getUrl() : '';
    }

    public function getCategoryDescription()
    {
        $categoryDescription = $this->getCategory() ? $this->getCategory()->getDescription() : '';

        // Check if the description is not null or empty before decoding
        if (!empty($categoryDescription)) {
            // Decode HTML entities
            $decodedDescription = html_entity_decode($categoryDescription);

            // Remove CSS styles using a regular expression
            $cleanedDescription = preg_replace('/<style\b[^>]*>(.*?)<\/style>|#.*?\{.*?\}/s', '', $decodedDescription);

            // Strip remaining HTML tags
            return strip_tags($cleanedDescription);
        }

        // Return an empty string if there's no description
        return '';
    }


    // public function getCategoryImageUrl()
    // {
    //     // Get the category image URL
    //     $imageUrl = $this->getCategory() ? $this->getCategory()->getImageUrl() : '';

    //     // If image URL is not empty, append it to the base URL
    //     if ($imageUrl) {
    //         // Remove leading slash if present
    //         $imageUrl = ltrim($imageUrl, '/');

    //         // Get the base URL for media from the store manager
    //         $baseUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    //         return $baseUrl . $imageUrl;
    //     }

    //     return '';
    // }
}

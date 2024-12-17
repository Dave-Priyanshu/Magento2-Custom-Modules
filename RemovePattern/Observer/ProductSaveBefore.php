<?php

namespace MageMonkeys\RemovePattern\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ProductSaveBefore implements ObserverInterface
{
    /**
     * Execute observer to clean URL Key before saving product.
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();

        // Only process if the product is new (not yet saved).
        if (!$product->getId()) {
            $urlKey = $product->getUrlKey();

            // If URL key is empty, generate it from the product name.
            if (empty($urlKey)) {
                $urlKey = $product->getName();
            }

            // Unwanted patterns to clean.
            $unwantedString = '-uk-company-since1983-nikko';
            $unwantedWords = ['uk', 'company', 'since1983', 'nikko'];

            // Remove the exact unwanted string.
            if (strpos($urlKey, $unwantedString) !== false) {
                $urlKey = str_replace($unwantedString, '', $urlKey);
            }

            // Remove individual unwanted words.
            foreach ($unwantedWords as $word) {
                $pattern = '-' . $word;
                $urlKey = str_replace($pattern, '', $urlKey);
            }

            // Clean up the URL key.
            $urlKey = preg_replace('/\s+/', '-', $urlKey); // Replace spaces with hyphens.
            $urlKey = preg_replace('/-+/', '-', $urlKey);  // Remove multiple hyphens.
            $urlKey = strtolower(trim($urlKey, '-'));     // Trim and convert to lowercase.

            // Set the cleaned URL key.
            $product->setUrlKey($urlKey);
        }
    }
}

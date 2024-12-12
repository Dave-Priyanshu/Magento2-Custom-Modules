<?php
namespace Priyanshu\OgTags\Block\Product;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\UrlInterface; // Add this line


class Product extends Template
{
    protected $productRepository;
    protected $registry;
    protected $urlInterface; // Add this line


    public function __construct(
        Template\Context $context,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Registry $registry,
        UrlInterface $urlInterface, // Inject UrlInterface
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        $this->registry = $registry;
        $this->urlInterface = $urlInterface; // Assign to property
        parent::__construct($context, $data);
    }

    public function getProduct()
    {
        return $this->registry->registry('current_product');
    }

    // public function getProductImageUrl()
    // {
    //     $product = $this->getProduct();
    //     return $product->getImageUrl();
    // }
    public function getProductImageUrl()
    {
        $product = $this->getProduct();
        if ($product && $product->getImage()) {
            return $this->urlInterface->getBaseUrl() . 'media/catalog/product' . $product->getImage();
        }
        return ''; // Return a default image URL if necessary
    }


    public function getProductName()
    {
        return $this->getProduct()->getName();
    }

    public function getProductUrl()
    {
        return $this->getProduct()->getProductUrl();
    }

    public function getProductDescription()
    {
        $product = $this->getProduct();
        return $product->getDescription();
        // return $product->getShortDescription();
    }
}

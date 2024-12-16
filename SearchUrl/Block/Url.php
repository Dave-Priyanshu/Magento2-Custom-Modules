<?php
namespace Priyanshu\SearchUrl\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\UrlInterface;
use Magento\Catalog\Model\CategoryRepository;
use Magento\Framework\App\RequestInterface;

class Url extends Template
{
    protected $urlBuilder;
    protected $categoryRepository;
    protected $request;

    public function __construct(
        Template\Context $context,
        UrlInterface $urlBuilder,
        CategoryRepository $categoryRepository,
        RequestInterface $request,
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->categoryRepository = $categoryRepository;
        $this->request = $request;
        parent::__construct($context, $data);
    }

    public function getCurrentUrl()
    {
        return $this->urlBuilder->getCurrentUrl();
    }

    public function getCategoryUrlFromSearchParam()
    {
        // Get the 'cat' parameter from the URL
        $categoryId = $this->getRequest()->getParam('cat');
        
        if ($categoryId) {
            try {
                // Load the category and get its URL
                $category = $this->categoryRepository->get($categoryId);
                return $category->getUrl();
            } catch (\Exception $e) {
                // Handle case where category doesn't exist or isn't accessible
                return __('Category not found');
            }
        }
        return __('No category specified');
    }
    public function isHomepage(){
        return $this->request->getFullActionName() == 'cms_index_index'; 
    }
    public function getHomepageUrl(){
        // return $this->urlBuilder->getBaseUrl();
        return rtrim($this->urlBuilder->getBaseUrl(), '/');
    }
}

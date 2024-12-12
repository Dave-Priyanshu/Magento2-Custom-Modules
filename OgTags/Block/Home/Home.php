<?php

namespace Priyanshu\OgTags\Block\Home;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;
use Magento\Framework\View\Page\Config as PageConfig;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Filesystem;
use Magento\Theme\Block\Html\Header\Logo;

class Home extends Template
{
    protected $registry;
    protected $pageConfig;
    protected $scopeConfig;
    protected $mediaDirectory;
    protected $mediaUrl;
    protected $_logo;

    public function __construct(
        Context $context,
        Registry $registry,
        PageConfig $pageConfig,
        ScopeConfigInterface $scopeConfig,
        Filesystem $filesystem,
        Logo $logo,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->pageConfig = $pageConfig;
        $this->scopeConfig = $scopeConfig;
        $this->mediaDirectory = $filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
        $this->mediaUrl = $context->getUrlBuilder()->getBaseUrl(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
        $this->_logo = $logo;
        parent::__construct($context, $data);
    }

    public function getLogoSrc()
    {    
        return $this->_logo->getLogoSrc();
    }

    public function getPageTitle()
    {
        return $this->pageConfig->getTitle()->get();
    }

    public function getPageDescription()
    {
        return $this->pageConfig->getDescription();
    }

    // public function getImageUrl()
    // {
    //     // Retrieve the custom logo from the configuration
    //     $logo = $this->scopeConfig->getValue('design/header/logo_src', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    //     $logoUrl = $this->mediaUrl . $logo;

    //     // Check if the logo URL exists
    //     if ($logo && file_exists($this->mediaDirectory->getAbsolutePath($logo))) {
    //         return $logoUrl;  // Return the custom logo URL
    //     }

    //     // Return the default Magento logo URL
    //     $logoBlock = $this->getLayout()->createBlock(Logo::class);
    //     return $logoBlock->getLogoSrc();
    // }


    public function getPageUrl()
    {
        return $this->_urlBuilder->getCurrentUrl();
    }
}

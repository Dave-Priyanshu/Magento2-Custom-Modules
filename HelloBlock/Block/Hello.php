<?php
namespace Priyanshu\HelloBlock\Block;

use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    public function getMessage()
    {
        return "Hello from Priyanshu!";
    }
}

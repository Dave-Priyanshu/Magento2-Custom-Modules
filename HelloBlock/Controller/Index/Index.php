<?php
namespace Priyanshu\HelloBlock\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    public function execute()
    {
        // Render the view using the layout
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}

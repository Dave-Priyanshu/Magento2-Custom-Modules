<?php

namespace Priyanshu\Faq\Block;

use Magento\Framework\View\Element\Template;

class Faq extends Template
{
    public function getFaqData()
    {
        return [
            ['question' => 'What is the warranty period?', 'answer' => 'The warranty period is 1 year.'],
            ['question' => 'Can I return this product?', 'answer' => 'Yes, you can return within 30 days of purchase.'],
            ['question' => 'Is this product available in different colors?', 'answer' => 'Yes, we have multiple colors available.']
        ];
    }
}

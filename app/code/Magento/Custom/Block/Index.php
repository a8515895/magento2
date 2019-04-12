<?php
namespace Magento\Custom\Block;
class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $layout = $this->_view->getLayout();
        $block = $layout->createBlock('Magento\Framework\View\Element\Text');
        $block->setText('Hello world from Nam currency !');
        $this->getResponse()->appendBody($block->toHtml());
    }
}
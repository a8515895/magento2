<?php
namespace Magento\Custom\Block;
class Footer extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}
    protected function _prepareLayout(){
        parent::_prepareLayout();
        return $this;
    }
}
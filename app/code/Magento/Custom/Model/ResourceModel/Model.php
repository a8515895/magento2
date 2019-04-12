<?php
namespace Magento\Custom\Model\ResourceModel;


class Model extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('magento_custom_model', 'post_id');
	}
	
}
<?php
namespace Magento\Custom\Model;
class Model extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'magento_custom_model';

	protected $_cacheTag = 'magento_custom_model';

	protected $_eventPrefix = 'magento_custom_model';

	protected function _construct()
	{
		$this->_init('Magento\Custom\Model\ResourceModel\Model');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
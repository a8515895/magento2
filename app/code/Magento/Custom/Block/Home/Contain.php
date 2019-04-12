<?php
namespace Magento\Custom\Block\Home;

use Magento\Catalog\Model\Product;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
class Contain extends \Magento\Framework\View\Element\Template
{
    public $_collectionFactory;
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\Layer\Resolver $layerResolver,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        array $data = []
    )
	{
        $this->_categoryFactory = $categoryFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_categoryHelper = $categoryHelper;
        $this->_catalogLayer = $layerResolver->get();
        $this->_coreRegistry = $registry;
        parent::__construct($context,$data);
	}
    protected function _prepareLayout(){
        parent::_prepareLayout();
        $this->setTemplate('Magento_Custom::contain/category.phtml');
        return $this;

    }
    public function getProduct(){        

        $productCollection =$this->_productCollectionFactory->create();
        $productCollection->addAttributeToSelect('*')->setPageSize(8)->setCurPage(1);
        $products=[];
        $stt = 0;
        foreach ($productCollection as $product){
            if($product->isSaleable()) $t = 1;
            else $t = 0;
            $products[$stt]['name'] = $product->getName();
            $products[$stt]['able'] = $t;
            $products[$stt]['price'] = $product->getPrice();
            $products[$stt]['img'] = $product->getImage();
            $stt++;
        } 
        return $products;
    }
    public function getProductName()
    {
        return $this->getProduct()->getName();
    }
}
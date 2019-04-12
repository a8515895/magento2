<?php
namespace Magento\Custom\Controller\Index;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
class Testajax extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_resultJsonFactory;
    public function __construct(Context $context, PageFactory $resultPageFactory, JsonFactory $resultJsonFactory,CollectionFactory $collectionFactory){
 
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultJsonFactory = $resultJsonFactory;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    public function execute(){
        $productCollection = $this->_collectionFactory->create();
        $productCollection->addAttributeToSelect('*');
        // Don't have to do this
        // $productCollection->load();
    
        foreach ($productCollection as $product){
             echo 'Name  =  '.$product->getName().'<br>';
        }  
    }
}
<?php
namespace Magento\Custom\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;
use \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_resultJsonFactory;
    protected $_collectionFactory;
    public function __construct(Context $context, PageFactory $resultPageFactory, JsonFactory $resultJsonFactory,CollectionFactory $collectionFactory){
 
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultJsonFactory = $resultJsonFactory;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    public function execute(){
        if (!$this->getRequest()->getPost('filter_template')) {
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('/');
        }
		$this->getResponse()->setHeader('Content-type','application/json');		
		$page = $this->resultPageFactory->create(false, ['isIsolated' => true, 'template'=>'Codazon_ProductFilter::blank.phtml']);
		$this->getResponse()->setBody($page->getLayout()->getBlock('product_ajax_load')->toHtml());
    }
}
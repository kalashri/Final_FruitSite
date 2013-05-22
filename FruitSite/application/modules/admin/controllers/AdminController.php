<?php 

class Admin_AdminController extends Zend_Controller_Action
{

    public function init()
    {
        try
        {
			/*Zend Database*/
			
			
			$settings=Zend_Registry::get('appconfig');
			
			$db=Zend_Db::factory($settings->database);
			
			//$_SESSION["db"]=$db;
			Zend_Registry::set('db',$db);
			
			Zend_Db_Table::setDefaultAdapter($db);

			$flashMessenger = $this->_helper->getHelper('FlashMessenger');
			$this->initView();
					
		}
		catch(exception $e)
		{
			echo "<pre>";
			print_r($e);
		}
    }

		public function postDispatch()
    {     
		$actionName=$this->getRequest()->getActionName();   
		if( $actionName != "emp-login")
		{
			$response = $this->getResponse();   
			//$response->insert('header', $this->view->render('header.phtml'));
		   // $response->insert('footer', $this->view->render('footer.phtml'));         
			
		}
	}

	public function empLoginAction()
    {     
		try
		{
			
			
			if(isset($_REQUEST['op']))
			{
				if($_REQUEST['op']=="login")
				{
					$loginObj=new Admin_Model_EmpLogin();
					$empLoginMapper=new Admin_Model_EmpLoginMapper();
					
					$rs=$empLoginMapper->findByField("emp_login_id",$_POST['userNameTxt'],$loginObj);
					
					if(sizeOf($rs))
					{
						$res=$empLoginMapper->toArray($rs[0]);
						if($_POST['userPasswordTxt']==$res['password'])
						{   
							$_SESSION['user']=$_POST['userNameTxt'];
							if($_SESSION['user']=="kalashri")
							{
							  $this->_redirect("admin/admin/bazaar-admin");
						    }
						    else
						    {
							  $this->_redirect("admin/admin/fruits-bazaar");
							}
						}
						
						else
						{
							$this->view->msg="Login Failed";
						}
					}
					else
					{
						$this->view->msg="Login Failed";
					}
				}
			}
		}
		catch(exception $e)
		{
			echo "<pre>";
			print_r($e);
		}
   
	}
	 public function logoutAction()
    {
		try
		{
			$this->_helper->viewRenderer->setNoRender();	
			session_start();
			session_destroy();
			header("Location: /FruitSite/public/admin/admin/emp-login");
			exit;
		}
		catch(exception $e)
		{
			echo "<pre>";
			print_r($e);
		}
	}
	public function fruitsBazaarAction()
    {       
		try
		{
			
			
			$orderDetailsObj=new Admin_Model_OrderDetails();
			$orderDetailsMapper=new Admin_Model_OrderDetailsMapper();
		
			//get customer id
			$customerDetailsObj1=new Admin_Model_Customer();
			$customerDetailsMapper=new  Admin_Model_CustomerMapper();
			$customerList=$customerDetailsMapper->getCustomerNamesList();
			$this->view->customerList=$customerList;		
			
			//get available fruits
			$FruitOrderDetailsMapper=new Admin_Model_ProductsMapper();
			$fruitList=$FruitOrderDetailsMapper->getFruitsList();			
			$fruitListQty=$FruitOrderDetailsMapper->getFruitsQtyList();
			$this->view->fruitList=$fruitList;	
			$this->view->fruitListQty=$fruitListQty;
			
			//get product id
			$productDetailsObj=new Admin_Model_Products();
			$productDetailsMapper=new Admin_Model_ProductsMapper();
			
			
			
			if(isset($_POST['msgHdn']))  
			{      
				if($_REQUEST['msgHdn']=="save")
				{
					$customerDetailsObj1=$customerDetailsMapper->findOneByField('username',$_POST['custNameList'],$customerDetailsObj1);
					$customerId=$customerDetailsObj1->getCustomerId();
					
					$orderDetailsObj->setDate(date("Y-m-d"));  
					$orderDetailsObj->setCustomerId($customerId);
					$id=$orderDetailsMapper->save($orderDetailsObj);
			
					$saveFruits=explode(',',$_POST['saveFruitHdn']);
					
					foreach($saveFruits as $key=>$value)
					{
					 if(is_null($value) or $value=='')
					 unset($saveFruits[$key]); 
					}
					
					for($i=1;$i<=count($saveFruits);$i++)
					{  						
						$fruitOrderedListObj=new Admin_Model_FruitOrder();
						$fruitOrderedListMapper=new  Admin_Model_FruitOrderMapper();
						
						$productDetailsObj=$productDetailsMapper->findOneByField('product_name',$saveFruits[$i],$productDetailsObj);
						$getId=$productDetailsObj->getPId();
						
						$fruitOrderedListObj->setOrderId($id);	
						$fruitOrderedListObj->setPId($getId);
					  
						$fruitOrderedListMapper->save($fruitOrderedListObj);
						$this->view->msg="Order added successfully";
					   
					}  
						
				}
			}
		
	}
	catch(exception $e)
	{
		echo "<pre>";
		print_r($e);
	}


}

	public function bazaarAdminAction()
    {     
			error_reporting(E_ALL);
			ini_set('display_errors', '1'); //For error reporting
	
			$orderDetailsMapper=new Admin_Model_OrderDetailsMapper();
			$dateList=$orderDetailsMapper->getDateList();
			if(isset($dateList))
			{
			  $dateOrderList=array_unique($dateList);
			  $this->view->dateList=$dateOrderList;
		    }
		    else
		    {
			 $this->view->msg="No Order Placed";
			}
		
				
		
			if(isset($_POST['msgHdn']))
			{
				if($_REQUEST['msgHdn']=="submit")
				{  
					$orderDetailsObj=new Admin_Model_OrderDetails();
					$orderDetailsMapper=new Admin_Model_OrderDetailsMapper();
				
					$fruitOrderedListObj=new Admin_Model_FruitOrder();
					$fruitOrderedListMapper=new Admin_Model_FruitOrderMapper();
					
					$productDetailsObj=new Admin_Model_Products();
					$productDetailsMapper=new Admin_Model_ProductsMapper();
			
					if(isset($_POST['orderDateList'])) 
					{
						$orderDate=$_POST['orderDateList'];
					}
					$orderDetailsObj=$orderDetailsMapper->findByField('date',$orderDate,$orderDetailsObj);
					//$getOrderId=$orderDetailsObj->getOrderId();  
					$key=0;    
					
					
					foreach($orderDetailsObj as $x)
					{
						$orderDetList[$key]=$orderDetailsMapper->toArray($x);
						$key++;
					} 
					
					$this->view->orderDetList=$orderDetList;
					
		           for($i=0;$i<count($orderDetList);$i++)
					{
						$orderList[]=$orderDetList[$i]['order_id']; 
						$custList[]=$orderDetList[$i]['customer_id'];
					}
		
	
					for($i=0;$i<count($custList);$i++)
					{   
						$customerDetailsObj1=new Admin_Model_Customer();
						$customerDetailsMapper=new Admin_Model_CustomerMapper();
						$customerDetailsObj1=$customerDetailsMapper->findOneByField('customer_id',$custList[$i],$customerDetailsObj1);
						$custDetList[$i]=$customerDetailsMapper->toArray($customerDetailsObj1);
					
					} 
					
					 $this->view->custList=$custDetList;
					 
				  
				}
			}     
			
	}
}
	
?>

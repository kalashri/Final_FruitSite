<?php
require_once('MainModel.php');

class Admin_Model_OrderDetails extends MainModel
{

    protected $_OrderId;
   
    protected $_Date;
  
    protected $_CustomerId;

function __construct() {
    $this->setColumnsList(array(
    'order_id'=>'OrderId',
    'date'=>'Date',
    'customer_id'=>'CustomerId',
    ));
}

    public function setOrderId($data)
    {
        $this->_OrderId=$data;
        return $this;
    }


    public function getOrderId()
    {
        return $this->_OrderId;
    }


    public function setDate($data)
    {
        $this->_Date=$data;
        return $this;
    }

    public function getDate()
    {
        return $this->_Date;
    }
    

    public function setCustomerId($data)
    {
        $this->_CustomerId=$data;
        return $this;
    }

    public function getCustomerId()
    {
        return $this->_CustomerId;
    }
    

    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new Admin_Model_OrderDetailsMapper());
        }
        return $this->_mapper;
    }

    public function deleteRowByPrimaryKey()
    {
        if (!$this->getOrderId())
            throw new Exception('Primary Key does not contain a value');
        return $this->getMapper()->getDbTable()->delete('order_id = '.$this->getOrderId());
    }

}


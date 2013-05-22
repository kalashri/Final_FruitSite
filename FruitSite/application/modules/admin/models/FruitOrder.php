<?php
require_once('MainModel.php');

class admin_Model_FruitOrder extends MainModel
{

    protected $_FpId;
  
    protected $_PId;

    protected $_OrderId;
    

    

function __construct() {
    $this->setColumnsList(array(
    'fp_id'=>'FpId',
    'p_id'=>'PId',
    'order_id'=>'OrderId',
    ));
}

    public function setFpId($data)
    {
        $this->_FpId=$data;
        return $this;
    }


    public function getFpId()
    {
        return $this->_FpId;
    }
    

    public function setPId($data)
    {
        $this->_PId=$data;
        return $this;
    }


    public function getPId()
    {
        return $this->_PId;
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
    
  
    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new admin_Model_FruitOrderMapper());
        }
        return $this->_mapper;
    }


    public function deleteRowByPrimaryKey()
    {
        if (!$this->getFpId())
            throw new Exception('Primary Key does not contain a value');
        return $this->getMapper()->getDbTable()->delete('fp_id = '.$this->getFpId());
    }

}


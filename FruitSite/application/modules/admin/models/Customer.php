<?php
require_once('MainModel.php');

class Admin_Model_Customer extends MainModel
{

    protected $_CustomerId;
    
    protected $_Username;
    

    

function __construct() {
    $this->setColumnsList(array(
    'customer_id'=>'CustomerId',
    'username'=>'Username',
    ));
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
    

    public function setUsername($data)
    {
        $this->_Username=$data;
        return $this;
    }

 
    public function getUsername()
    {
        return $this->_Username;
    }
    
    
    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new Admin_Model_CustomerMapper());
        }
        return $this->_mapper;
    }



    public function deleteRowByPrimaryKey()
    {
        if (!$this->getCustomerId())
            throw new Exception('Primary Key does not contain a value');
        return $this->getMapper()->getDbTable()->delete('customer_id = '.$this->getCustomerId());
    }

}


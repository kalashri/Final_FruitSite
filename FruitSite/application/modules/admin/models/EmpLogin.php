<?php
require_once('MainModel.php');

class Admin_Model_EmpLogin extends MainModel
{

    protected $_EmpLoginId;

    protected $_Password;
    

    

function __construct() {
    $this->setColumnsList(array(
    'emp_login_id'=>'EmpLoginId',
    'password'=>'Password',
    ));
}



    public function setEmpLoginId($data)
    {
        $this->_EmpLoginId=$data;
        return $this;
    }

    public function getEmpLoginId()
    {
        return $this->_EmpLoginId;
    }


    public function setPassword($data)
    {
        $this->_Password=$data;
        return $this;
    }


     
    public function getPassword()
    {
        return $this->_Password;
    }


    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new Admin_Model_EmpLoginMapper());
        }
        return $this->_mapper;
    }


    public function deleteRowByPrimaryKey()
    {
        if (!$this->getEmpLoginId())
            throw new Exception('Primary Key does not contain a value');
        return $this->getMapper()->getDbTable()->delete('emp_login_id = '.$this->getEmpLoginId());
    }

}


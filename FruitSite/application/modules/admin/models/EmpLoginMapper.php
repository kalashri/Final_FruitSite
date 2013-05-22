<?php

class Admin_Model_EmpLoginMapper {


    protected $_dbTable;

   
    public function findOneByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();

            $row = $table->fetchRow($select->where("{$field} = ?", $value));
            if (0 == count($row)) {
                    return;
            }

            $cls->setEmpLoginId($row->emp_login_id)
		->setPassword($row->password);
	    return $cls;
    }


    public function toArray($cls) {
        $result = array(
        
            'emp_login_id' => $cls->getEmpLoginId(),
            'password' => $cls->getPassword(),
                    
        );
        return $result;
    }

 
    public function findByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();
            $result = array();

            $rows = $table->fetchAll($select->where("{$field} = ?", $value));
            foreach ($rows as $row) {
                    $cls=new Admin_Model_EmpLogin();
                    $result[]=$cls;
                    $cls->setEmpLoginId($row->emp_login_id)
		->setPassword($row->password);
            }
            return $result;
    }
    
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }


    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Admin_Model_DbTable_EmpLogin');
        }
        return $this->_dbTable;
    }
 
    public function save(Admin_Model_EmpLogin $cls,$ignoreEmptyValuesOnUpdate=true)
    {
        if ($ignoreEmptyValuesOnUpdate) {
            $data = $cls->toArray();
            foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
            }
        }

        if (null === ($id = $cls->getEmpLoginId())) {
            unset($data['emp_login_id']);
            $id=$this->getDbTable()->insert($data);
            $cls->setEmpLoginId($id);
        } else {
            if ($ignoreEmptyValuesOnUpdate) {
             $data = $cls->toArray();
             foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
                }
            }

            $this->getDbTable()->update($data, array('emp_login_id = ?' => $id));
        }
    }

    public function find($id, Admin_Model_EmpLogin $cls)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }

        $row = $result->current();

        $cls->setEmpLoginId($row->emp_login_id)
		->setPassword($row->password);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Admin_Model_EmpLogin();
            $entry->setEmpLoginId($row->emp_login_id)
                  ->setPassword($row->password)
                              ->setMapper($this);
            $entries[] = $entry;
        }
        return $entries;
    }

    public function fetchList($where=null, $order=null, $count=null, $offset=null)
    {
            $resultSet = $this->getDbTable()->fetchAll($where, $order, $count, $offset);
            $entries   = array();
            foreach ($resultSet as $row)
            {
                    $entry = new Admin_Model_EmpLogin();
                    $entry->setEmpLoginId($row->emp_login_id)
                          ->setPassword($row->password)
                          ->setMapper($this);
                    $entries[] = $entry;
            }
            return $entries;
    }

}

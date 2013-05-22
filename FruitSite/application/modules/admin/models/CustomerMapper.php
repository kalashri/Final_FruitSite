<?php


class Admin_Model_CustomerMapper {

    protected $_dbTable;

    
    public function findOneByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();

            $row = $table->fetchRow($select->where("{$field} = ?", $value));
            if (0 == count($row)) {
                    return;
            }

            $cls->setCustomerId($row->customer_id)
		->setUsername($row->username);
	    return $cls;
    }


    public function toArray($cls) {
        $result = array(
        
            'customer_id' => $cls->getCustomerId(),
            'username' => $cls->getUsername(),
                    
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
                    $cls=new Admin_Model_Customer();
                    $result[]=$cls;
                    $cls->setCustomerId($row->customer_id)
		->setUsername($row->username);
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
            $this->setDbTable('Admin_Model_DbTable_Customer');
        }
        return $this->_dbTable;
    }


    public function save(Admin_Model_Customer $cls,$ignoreEmptyValuesOnUpdate=true)
    {
        if ($ignoreEmptyValuesOnUpdate) {
            $data = $cls->toArray();
            foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
            }
        }

        if (null === ($id = $cls->getCustomerId())) {
            unset($data['customer_id']);
            $id=$this->getDbTable()->insert($data);
            $cls->setCustomerId($id);
        } else {
            if ($ignoreEmptyValuesOnUpdate) {
             $data = $cls->toArray();
             foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
                }
            }

            $this->getDbTable()->update($data, array('customer_id = ?' => $id));
        }
    }

    public function find($id, Admin_Model_Customer $cls)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }

        $row = $result->current();

        $cls->setCustomerId($row->customer_id)
		->setUsername($row->username);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Admin_Model_Customer();
            $entry->setCustomerId($row->customer_id)
                  ->setUsername($row->username)
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
                    $entry = new Admin_Model_Customer();
                    $entry->setCustomerId($row->customer_id)
                          ->setUsername($row->username)
                          ->setMapper($this);
                    $entries[] = $entry;
            }
            return $entries;
    }
    
     public function getCustomerNamesList()
    {
		try
		{			
			$customerList=$this->fetchAll();			
			$key=0;
			foreach($customerList as $x)
			{
				$customerList1[$key]=$x->getUsername();
				$key++;
			}
			return $customerList1;
		}
		catch(exception $e)
		{
			
		}
		
	}
	     public function getCustomerList()
    {
		try
		{			
			$customerList=$this->fetchAll();			
			$key=0;
			foreach($customerList as $x)
			{
				$customerList1[$key]=$x->toArray();
				$key++;
			}
			return $customerList1;
		}
		catch(exception $e)
		{
			
		}
		
	}

}

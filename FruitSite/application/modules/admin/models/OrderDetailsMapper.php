<?php

class Admin_Model_OrderDetailsMapper {

    protected $_dbTable;
 
    public function findOneByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();

            $row = $table->fetchRow($select->where("{$field} = ?", $value));
            if (0 == count($row)) {
                    return;
            }

            $cls->setOrderId($row->order_id)
		->setDate($row->date)
		->setCustomerId($row->customer_id);
	    return $cls;
    }

    public function toArray($cls) {
        $result = array(
        
            'order_id' => $cls->getOrderId(),
            'date' => $cls->getDate(),
            'customer_id' => $cls->getCustomerId(),
                    
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
                    $cls=new Admin_Model_OrderDetails();
                    $result[]=$cls;
                    $cls->setOrderId($row->order_id)
		->setDate($row->date)
		->setCustomerId($row->customer_id);
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
            $this->setDbTable('Admin_Model_DbTable_OrderDetails');
        }
        return $this->_dbTable;
    }

    public function save(Admin_Model_OrderDetails $cls,$ignoreEmptyValuesOnUpdate=true)
    {
        if ($ignoreEmptyValuesOnUpdate) {
            $data = $cls->toArray();
            foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
            }
        }

        if (null === ($id = $cls->getOrderId())) {
            unset($data['order_id']);
            $id=$this->getDbTable()->insert($data);
            $cls->setOrderId($id);
        } else {
            if ($ignoreEmptyValuesOnUpdate) {
             $data = $cls->toArray();
             foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
                }
            }

            $this->getDbTable()->update($data, array('order_id = ?' => $id));
        }
        return $cls->getOrderId();
    }

    public function find($id, Admin_Model_OrderDetails $cls)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }

        $row = $result->current();

        $cls->setOrderId($row->order_id)
		->setDate($row->date)
		->setCustomerId($row->customer_id);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Admin_Model_OrderDetails();
            $entry->setOrderId($row->order_id)
                  ->setDate($row->date)
                  ->setCustomerId($row->customer_id)
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
                    $entry = new Admin_Model_OrderDetails();
                    $entry->setOrderId($row->order_id)
                          ->setDate($row->date)
                          ->setCustomerId($row->customer_id)
                          ->setMapper($this);
                    $entries[] = $entry;
            }
            return $entries;
    }
    
	  public function getDateList()
    {
		try
		{	 
			$dateList=$this->fetchAll();	
			$key=0;
		
			foreach($dateList as $x)
			{
				$dateList1[$key]=$x->getDate();
				$key++;
			}
			if(isset($dateList1))
			{
			return $dateList1;
		}
		}
		catch(exception $e)
		{
			
		}
		
	}
	  public function getOrderIdList()
    {
		try
		{	 
			$orderList=$this->fetchAll();	
			$key=0;
		
			foreach($orderList as $x)
			{
				$orderList1[$key]=$x->getOrderId();
				$key++;
			}
			return $orderList1;
		}
		catch(exception $e)
		{
			
		}
		
	}
	 public function getOrderId()
    {
		try
		{	 
			$orderList=$this->fetchAll();	
			$key=0;
		
			foreach($orderList as $x)
			{
				$orderList1[$key]=$x->toArray();
				$key++;
			}
			return $orderList1;
		}
		catch(exception $e)
		{
			
		}
		
	}

 public function getCustIdList()
    {
		try
		{	 
			$custList=$this->fetchAll();	
			$key=0;
		
			foreach($custList as $x)
			{
				$custList1[$key]=$x->getCustomerId();
				$key++;
			}
			return $custList1;
		}
		catch(exception $e)
		{
			
		}
		
	}
	public function getCustId()
    {
		try
		{	 
			$custList=$this->fetchAll();	
			$key=0;
		
			foreach($custList as $x)
			{
				$custList1[$key]=$x->toArray();
				$key++;
			}
			return $custList1;
		}
		catch(exception $e)
		{
			
		}
		
	}
	


}

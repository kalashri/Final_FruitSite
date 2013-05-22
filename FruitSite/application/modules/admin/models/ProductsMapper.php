<?php

class Admin_Model_ProductsMapper {

    protected $_dbTable;
   
    public function findOneByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();

            $row = $table->fetchRow($select->where("{$field} = ?", $value));
            if (0 == count($row)) {
                    return;
            }

            $cls->setPId($row->p_id)
		->setProductName($row->product_name)
		->setProductPrice($row->product_price)
		->setProductImage($row->product_image)
		->setComments($row->comments);
	    return $cls;
    }

    public function toArray($cls) {
        $result = array(
        
            'p_id' => $cls->getPId(),
            'product_name' => $cls->getProductName(),
            'product_price' => $cls->getProductPrice(),
            'product_image' => $cls->getProductImage(),
            'comments' => $cls->getComments(),
                    
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
                    $cls=new Admin_Model_Products();
                    $result[]=$cls;
                    $cls->setPId($row->p_id)
		->setProductName($row->product_name)
		->setProductPrice($row->product_price)
		->setProductImage($row->product_image)
		->setComments($row->comments);
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
            $this->setDbTable('Admin_Model_DbTable_Products');
        }
        return $this->_dbTable;
    }

    public function save(Admin_Model_Products $cls,$ignoreEmptyValuesOnUpdate=true)
    {
        if ($ignoreEmptyValuesOnUpdate) {
            $data = $cls->toArray();
            foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
            }
        }

        if (null === ($id = $cls->getPId())) {
            unset($data['p_id']);
            $id=$this->getDbTable()->insert($data);
            $cls->setPId($id);
        } else {
            if ($ignoreEmptyValuesOnUpdate) {
             $data = $cls->toArray();
             foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
                }
            }

            $this->getDbTable()->update($data, array('p_id = ?' => $id));
        }
    }

    public function find($id, Admin_Model_Products $cls)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }

        $row = $result->current();

        $cls->setPId($row->p_id)
		->setProductName($row->product_name)
		->setProductPrice($row->product_price)
		->setProductImage($row->product_image)
		->setComments($row->comments);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Admin_Model_Products();
            $entry->setPId($row->p_id)
                  ->setProductName($row->product_name)
                  ->setProductPrice($row->product_price)
                  ->setProductImage($row->product_image)
                  ->setComments($row->comments)
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
                    $entry = new Admin_Model_Products();
                    $entry->setPId($row->p_id)
                          ->setProductName($row->product_name)
                          ->setProductPrice($row->product_price)
                          ->setProductImage($row->product_image)
                          ->setComments($row->comments)
                          ->setMapper($this);
                    $entries[] = $entry;
            }
            return $entries;
    }
      public function getFruitsList()
    {
		try
		{			
			$fruitList=$this->fetchAll();			
			$key=0;
			foreach($fruitList as $x)
			{
				$fruitList1[$key]=$x->getProductName();
				$key++;
			}
			return $fruitList1;
		}
		catch(exception $e)
		{
			
		}
		
	}
	 public function getFruitsQtyList()
    {
		try
		{			
			$fruitQtyList=$this->fetchAll();			
			$key=0;
			foreach($fruitQtyList as $x)
			{
				$fruitQtyList1[$key]=$x->getProductPrice();
				$key++;
			}
			return $fruitQtyList1;
		}
		catch(exception $e)
		{
			
		}
		
	}

}

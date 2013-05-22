<?php

class admin_Model_FruitOrderMapper {

    protected $_dbTable;

    public function findOneByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();

            $row = $table->fetchRow($select->where("{$field} = ?", $value));
            if (0 == count($row)) {
                    return;
            }

            $cls->setFpId($row->fp_id)
		->setPId($row->p_id)
		->setOrderId($row->order_id);
	    return $cls;
    }

    public function toArray($cls) {
        $result = array(
        
            'fp_id' => $cls->getFpId(),
            'p_id' => $cls->getPId(),
            'order_id' => $cls->getOrderId(),
                    
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
                    $cls=new admin_Model_FruitOrder();
                    $result[]=$cls;
                    $cls->setFpId($row->fp_id)
		->setPId($row->p_id)
		->setOrderId($row->order_id);
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
            $this->setDbTable('admin_Model_DbTable_FruitOrder');
        }
        return $this->_dbTable;
    }

    public function save(admin_Model_FruitOrder $cls,$ignoreEmptyValuesOnUpdate=true)
    {
        if ($ignoreEmptyValuesOnUpdate) {
            $data = $cls->toArray();
            foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
            }
        }

        if (null === ($id = $cls->getFpId())) {
            unset($data['fp_id']);
            $id=$this->getDbTable()->insert($data);
            $cls->setFpId($id);
        } else {
            if ($ignoreEmptyValuesOnUpdate) {
             $data = $cls->toArray();
             foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
                }
            }

            $this->getDbTable()->update($data, array('fp_id = ?' => $id));
        }
    }

    public function find($id, admin_Model_FruitOrder $cls)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }

        $row = $result->current();

        $cls->setFpId($row->fp_id)
		->setPId($row->p_id)
		->setOrderId($row->order_id);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new admin_Model_FruitOrder();
            $entry->setFpId($row->fp_id)
                  ->setPId($row->p_id)
                  ->setOrderId($row->order_id)
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
                    $entry = new admin_Model_FruitOrder();
                    $entry->setFpId($row->fp_id)
                          ->setPId($row->p_id)
                          ->setOrderId($row->order_id)
                          ->setMapper($this);
                    $entries[] = $entry;
            }
            return $entries;
    }
     public function fetchProductId()
    {
		$resultSet = $this->fetchAll();
		$key=0;
		foreach($resultSet as $x)
		{
			$res=$this->toArray($x);
			$productIdList[$key]=$res['p_id'];
			$key++;
		}
		return $productIdList;

	}

}

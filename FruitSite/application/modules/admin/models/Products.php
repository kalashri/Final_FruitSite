<?php
require_once('MainModel.php');

class Admin_Model_Products extends MainModel
{

    protected $_PId;
 
    protected $_ProductName;
    
    protected $_ProductPrice;

    protected $_ProductImage;
  
    protected $_Comments;
    

    

function __construct() {
    $this->setColumnsList(array(
    'p_id'=>'PId',
    'product_name'=>'ProductName',
    'product_price'=>'ProductPrice',
    'product_image'=>'ProductImage',
    'comments'=>'Comments',
    ));
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

    public function setProductName($data)
    {
        $this->_ProductName=$data;
        return $this;
    }


    public function getProductName()
    {
        return $this->_ProductName;
    }

    public function setProductPrice($data)
    {
        $this->_ProductPrice=$data;
        return $this;
    }

    public function getProductPrice()
    {
        return $this->_ProductPrice;
    }

    public function setProductImage($data)
    {
        $this->_ProductImage=$data;
        return $this;
    }


    public function getProductImage()
    {
        return $this->_ProductImage;
    }

    public function setComments($data)
    {
        $this->_Comments=$data;
        return $this;
    }

    public function getComments()
    {
        return $this->_Comments;
    }
    
    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new Admin_Model_ProductsMapper());
        }
        return $this->_mapper;
    }

    public function deleteRowByPrimaryKey()
    {
        if (!$this->getPId())
            throw new Exception('Primary Key does not contain a value');
        return $this->getMapper()->getDbTable()->delete('p_id = '.$this->getPId());
    }

}


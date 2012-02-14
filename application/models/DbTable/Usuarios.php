<?php

class Application_Model_DbTable_Usuarios extends Zend_Db_Table_Abstract
{

    protected $_name = 'Usuarios';
    protected $_primary = 'id'; 
    public function init() 
    { 

    } 
    public function listar(){ 

        return $this->fetchAll(); 
    } 
	
	 public function comprobar($usuario,$password)
    {
        $result = $this->select()
                       ->where("nombre = ?",$usuario)
                       ->where("password = ?",md5($password))
                       ->query();
        return $result->fetchAll();
    }

}


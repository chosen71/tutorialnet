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

}


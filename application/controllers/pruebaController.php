<?php

class Default_PruebaController extends Zend_Controller_Action
{
    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function init()
    {
        /* Initialize action controller here */
        //$front = Zend_Controller_Front::getInstance();
        
    }

    public function indexAction()
    {
        // action body
        /* @var $setParam type */
        $front = Zend_Controller_Front::getInstance();
        $front->setDefaultAction('index2Action');
        $setParam = $front->setParam('noViewRenderer', false);
        //$front->addControllerDirectory('../modules/foo/controllers', 'foo');
        echo $front->getModuleDirectory();
        //$front->addModuleDirectory('/application/models');
        //$front->addModuleDirectory('../models/', 'Usuarios');
        //$request=Zend_Controller_Request_Http::getInstance();
        //echo $request->getControllerName()."<br>";
        
        echo $this->getRequest()->getActionName()."<br>"; // devuelve el nombre del action actual
        echo $this->getRequest()->getControllerName()."<br>"; // el nombre del controller
        echo $this->getRequest()->getModuleName()."<br>"; // el nombre del módulo
        echo $this->getRequest()->getRequestUri()."<br>"; // la url actual
        echo $this->getRequest()->isPost()."<br>"; // si el request fue hecho por el método POST
        echo $this->getRequest()->isGet()."<br>"; // si el request fue hecho por el método POST
        echo $this->getRequest()->isXmlHttpRequest()."<br>"; // o fue hecho por ajax?
        
        //$rows = new Application_Model_GuestusuariosMapper(); 
        // Prepara un listado de las 10 últimas ciudades 
        //$a = $rows->listar(); 
        //print_r($a); 
        
        $usuarios = new Application_Model_DbTable_Usuarios(); 
        $rows = $usuarios->listar();
        echo "<pre>"; print_r($rows); echo "<pre>";
        //$this->setParams("rows",$rows);
        
        //echo $usuarios->fetchAll();
        //$this->view->entries = ;
        
    }

    public function index2Action()
    {
        // action body
        /* @var $setParam type */
        $front = Zend_Controller_Front::getInstance();
        echo "pepe";
    }
    
}
?>
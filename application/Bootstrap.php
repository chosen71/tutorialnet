<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload()
    {
        $autoloader = new Zend_Loader_Autoloader_Resource(array(
                'namespace' => '',
                'basePath' => APPLICATION_PATH,
                'resourceTypes' => array(
                    'form' => array(
                        'path' => 'forms',
                        'namespace' => 'Form',
                    ),
                    'model' => array(
                        'path' => 'models',
                        'namespace' => 'Model',
                    ),
                )
            ));
        return $autoloader;
    }
    
    protected function _initView()
    {
        // Inicializar la vista
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');
        $view->headTitle('Mi primera aplicación');
        //die();
        // A�adir al ViewRenderer
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
            'ViewRenderer'
        );
        
        //die();
        $resource = $this->getPluginResource('db');
        //echo $resource;
//die();
        $db = $resource->getDbAdapter();
       
        $viewRenderer->setView($view);

        
        
        // Retorno, de modo que pueda ser almacenada en el arranque (bootstrap)

        return $view;
    }

    
    
}
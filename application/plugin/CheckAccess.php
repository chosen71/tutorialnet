<?php
class Plugin_CheckAccess extends Zend_Controller_Plugin_Abstract
{
    /**
     * Contiene el objeto Zend_Auth
     *
     * @var Zend_Auth
     */
    private $_auth;
 
    /**
     * El objeto de la clase singleton
     *
     * @var Plugin_CheckAccess
     */
    static private $instance = NULL;
 
    /**
     * Constructor
     */
    private function __construct()
    {
        $this->_auth =  Zend_Auth::getInstance();
    }
 
    /**
     * Devuelve el objeto de la clase singleton
     *
     * @return Plugin_CheckAccess
     */
    static public function getInstance() {
       if (self::$instance == NULL) {
          self::$instance = new Plugin_CheckAccess ();
       }
       return self::$instance;
    }
    
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $controllerName = $request->getControllerName();
 
        // Si el usuario esta autentificado
        if ($this->_auth->hasIdentity()) {
 
        } else {
            // Si el Usuario no esta identificado y no se dirige a la página de Login
            if ($controllerName != 'login') {
                // Mostramos al usuario el Formulario de Login
                $request->setControllerName("login");
                $request->setActionName("index");
            }
        }
    }
    
   
    /**
        * Cerrar sesión
        *
        * Elimina los datos almacenados en el Zend_Auth
        */
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }  
 }
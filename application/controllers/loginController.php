<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginController
 *
 * @Miguel Web
 */
  
 
class Default_LoginController extends Zend_Controller_Action
{
    //put your code here
    public function indexAction()
    {
        $form=new Application_Form_Login();
        $form->setAction('/login/check');
        $this->view->form = $form;
    }
    
    public function checkAction($form)
    {
        
        $request = $this->getRequest();        
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Application_Model_DbTable_Usuarios($form->getValues());
                return $this->_helper->redirector('index');
            }
        }
        
        echo "<pre>"; print_r($_POST); echo "<pre>";
        die();
         if ($form->isValid($_POST)) {
            $values = $form->getValues();

            // Creamos un adaptador de Zend_Auth para consultar una tabla de la base de datos
            $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
            $authAdapter ->setTableName('usuarios')              // Nombre de la tabla
                            ->setIdentityColumn('nombre')           // Campo de identificación
                            ->setCredentialColumn('password')       // Campo de contraseña
                            ->setIdentity($values['nombre'])        // Valor de identificación
                            ->setCredential($values['password']);   // Valor de contraseña

            // Recogemos Zend_Auth
            $auth = Zend_Auth::getInstance();
            // Realiza la comprobación con el adaptador que hemos creado
            $result = $auth->authenticate($authAdapter);

            // Si la autentificación es válida
            if ($result->isValid()) {
                // Recoge los valores de las columnas del registro de la Base de Datos y
                // los almacena como identidad en Zend_Auth, para un uso posterior
                //$data = $authAdapter->getResultRowObject(array('nombre','email'));
                //$auth->getStorage()->write($data);

                $this->_redirect(array("controller"=>"prueba","action"=>"index2"));

            } else {
                $this->view->loginError = $result->getMessages();
            }
        }
        return $form;
    }
}
?>

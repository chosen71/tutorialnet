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
    public function indexAction($form = null)
    {
        if($form == null){
            $form=new Application_Form_Login();
            $form->setAction('login/check');
        }
        $this->view->form = $form;
    }
    
    public function checkAction()
    {
        $front = Zend_Controller_Front::getInstance();
        $front->setParam('noViewRenderer', false);
        $form = new Application_Form_Login();
        $values = $this->getRequest()->getParams();
        if (!$this->getRequest()->isPost())
        {
            return $this->_forward('index',array("form"=>$form));
        }
        
        if (!$form->isValid($values))
        {
            // Falla la validación; Se vuelve a mostrar el formulario
            //$this->view->form = $form;
            //echo "mal";
            return $this->_redirect('login',array("form"=>$form));
        }else{
            //echo "<pre>"; print_r($values); echo "</pre>";
            
            $authAdapter = new Application_Model_DbTable_Usuarios();
            echo"<pre>"; print_r($authAdapter->comprobar($values["nombre"],$values["password"])); echo "</pre>";
            
        }
        
        
        // ahora intenta y autentica...
    }
}
?>

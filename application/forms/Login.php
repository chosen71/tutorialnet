<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyForm
 *
 * @author Web
 */
class Application_Form_Login extends Zend_Form
{
    /* método usado para inicializar el form */
    public function init() 
    {
        $this->setMethod('post');
        
        // Crea un y configura el elemento username
        $username = $this->createElement('text', 'nombre');
        $username->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-z]+/'))
                ->addValidator('stringLength', false, array(6, 20))
                ->setRequired(true)
                ->addFilter('StringToLower')
                ->addErrorMessage("mensaje de error");

        // Crea y configura el elemento password:
        $password = $this->createElement('password', 'password');
        $password->addValidator('StringLength', false, array(6))
                 ->setRequired(true);

        $submit = $this->createElement('submit', 'submit');
        
        // Añade los elementos al formulario:
        $this->addElements(array($username,$password,$submit));
        $this->setElementFilters(array('StringTrim'));
        //$this->addDisplayGroup(array('username', 'password'), 'login');
    }
}

?>

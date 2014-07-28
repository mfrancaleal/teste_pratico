<?php

class User extends AppModel
{
    public function beforeSave($options = array())
       {
           if(isset($this->data['User']['password']))
           {
               $this->data['User']['password'] = Security::hash($this->data['User']['password'], 'sha256', true);
           }
           
         return TRUE;
       }
       
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'email',
                'message' => 'Informe um email válido'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Informe uma senha'
            )
        ),
        'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Informe seu nome'
            )
        )
    );
}
?>
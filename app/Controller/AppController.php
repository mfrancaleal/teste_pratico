<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller{
	//COMP QUE SÃO UTILIZADOS EM TODA APLICAÇÃO
	public $components = array('Session', 'Cookie', 'Auth');
	
        public function index() 
	{
		
	}
        
        public function beforeFilter() {
    
        // Model de usuários
        $this->Auth->userModel = 'Cliente';
        // Campos de usuário e senha
        $this->Auth->fields = array(
            'username' => 'email',
            'password' => 'senha'
        );
        // Condição de usuário ativo/válido (opcional)
        $this->Auth->userScope = array(
            'Cliente.ativo' => true
        );
        // Action da tela de login
        $this->Auth->loginAction = array(
            'controller' => 'clientes',
            'action' => 'login'
        );
        // Action da tela após o login (com sucesso)
        $this->Auth->loginRedirect = array(
            'controller' => 'clientes',
            'action' => 'home'
        );
         
        // Action para redirecionamento após o logout
        $this->Auth->logoutRedirect = array(
            'controller' => 'pages',
            'action' => 'display', 'home'
        );
         
        // Mensagens de erro
        $this->Auth->loginError = __('Dados(s) incorretos(s)', true);
        $this->Auth->authError = __('Acesso permitido com login', true);
		
		
    }

}

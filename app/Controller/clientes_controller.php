<?php
class ClientesController extends AppController{
    public function login();
    
    public function logout(){
        //logoutRedirect
        $this->redirect($this->Auth->logout());
    }
}
?>
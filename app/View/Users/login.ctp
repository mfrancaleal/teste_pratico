<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Users', array('action'=>'login'));?>
    <fieldset>
        <legend><?php echo __('Por favor informe um login e senha'); ?></legend>
        <?php
        echo $this->Form->input('EMAIL', array('name'=>'username','type'=>'email'));
        echo $this->Form->input('SENHA', array('name'=>'password','type'=>'password'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));


?>
</div>
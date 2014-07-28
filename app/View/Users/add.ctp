<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Novo usuário'); ?></legend>
        <?php
        echo $this->Form->input('EMAIL',array('name'=>'username', 'type' => 'email'));
        echo $this->Form->input('SENHA',array('name'=>'password','type' => 'password'));
        echo $this->Form->input('NOME',array('name'=>'nome','type'=>'text'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Salvar'));?>
</div>
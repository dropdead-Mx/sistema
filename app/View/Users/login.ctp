<h3>Bienvenido</h3>
<div id="loginForm">
	
<?php 
 
	echo $this->Form->create('User',array('action' => 'login'));
	echo $this->Form->input('email',array('label'=>'Usuario','id'=>'userLogin'));
	echo $this->Form->input('password',array('label'=>'Contraseña','id'=>'passwordLogin'));
	echo $this->Form->end('acceder');


?>

</div>

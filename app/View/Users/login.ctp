<div class="contenedor">
<div class="loginEncabezado">
	Plataforma Dorados
</div>
<div id="loginForm">
	
<?php 
 
	
	echo $this->Form->create('User',array('action' => 'login'));
	echo $this->Form->input('email',array('label'=>'Usuario','id'=>'userLogin'));
	echo $this->Form->input('password',array('label'=>'Contraseña','id'=>'passwordLogin'));
	echo $this->Form->end('Entrar');


?>
</div>

<h2 class="Bienvenido">Bienvenido</h2>
<p class="textoBienvenida">La manera más segura y fácil para educadores de conectarse y colaborar con estudiantes entre sí.</p>
</div>

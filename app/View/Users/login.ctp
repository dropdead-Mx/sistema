<div class="contenedor">
<figure>
	<?php echo $this->Html->image("logoNuevo.png");?>
</figure>
<div id="loginForm">
	
<?php 
 
	
	echo $this->Form->create('User',array('action' => 'login'));
	echo $this->Form->input('email',array('label'=>'','id'=>'userLogin','placeholder'=>'Usuario'));
	echo $this->Form->input('password',array('label'=>'','id'=>'passwordLogin','placeholder'=>'Password'));
	echo $this->Form->end('Entrar');


?>
</div>
<div class="errores">
			
		<?php echo $this->Session->flash(); ?>
</div>

</div>

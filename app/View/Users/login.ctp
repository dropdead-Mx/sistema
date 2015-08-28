<div class="contenedor">
<figure>
	<?php echo $this->Html->image("logoNuevo.png");?>
</figure>
<div id="loginForm">
	
<?php 
 
	
	echo $this->Form->create('User',array('action' => 'login'));
	echo $this->Form->input('email',array('label'=>'+','id'=>'userLogin'));
	echo $this->Form->input('password',array('label'=>'+','id'=>'passwordLogin'));
	echo $this->Form->end('Entrar');


?>
</div>


</div>

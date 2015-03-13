<h2>Editar Grupo De usuarios</h2>

<fieldset>
	<?php 
	echo $this->Form->create('Group');
	echo $this->Form->input('name',array('label'=>'Nombre del Grupo de usuarios'));
	// echo $this->Form->input('created');
	// echo $this->Form->input('modified');
	echo $this->Form->input('id',array('type'=>'hidden'));
	echo $this->Form->end('Registrar Grupo');








	?>
</fieldset>
<h2>Editar Carrera</h2>
<?php 
 	echo $this->Form->create('Career',array('action'=>'edit'));
 	echo $this->Form->input('name',array('label'=> 'Nombre de la carrera'));
	echo $this->Form->input('abrev',array('label'=> 'Abreviatura de la carrera'));
 	
 	echo $this->Form->input('id',array('type'=> 'hidden'));

	echo $this->Form->end('Guardar Carrera');


?>
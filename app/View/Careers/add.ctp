<div class="form">

	<span>Agregar Carrera</span>
	
	<?php 
	echo $this->Form->create('Career');
	echo $this->Form->input('name',array('label'=> 'Nombre de la carrera'));
	echo $this->Form->input('abrev',array('label'=> 'Abreviatura de la carrera'));

	echo $this->Form->end('Guardar Carrera');

?>



</div>
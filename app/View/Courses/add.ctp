<h2>Agregar Materia</h2>
 
<fieldset>
	<?php 

		echo $this->Form->create('Course');
		echo $this->Form->input('name',array('label'=>'Nombre de la materia'));
		echo $this->Form->input('semester',array('label'=>'Cuatrimestre'));
		echo $this->Form->input('career_id',array('label'=>'Carrera'));
		echo $this->Form->input('user_id',array('label'=>'Impartida por: '));
		echo $this->Form->end('Registrar Materia');
		echo $this->Form->input('id',array('type'=>'hidden'));
		


	?>
</fieldset>
<h2>Agregar Materia</h2>
 
<fieldset>
	<?php 

		echo $this->Form->create('Course');
		echo $this->Form->input('name',array('label'=>'Nombre de la materia'));
		echo $this->Form->input('semester',array('label'=>'Cuatrimestre','type'=>'select','options'=>array(
			'--'=>'selecciona un cuatrimestre',
			'1'=>'1er cuatrimestre',
			'2'=>'2do cuatrimestre',
			'3'=>'3er cuatrimestre',
			'4'=>'4to cuatrimestre',
			'5'=>'5to cuatrimestre',
			'6'=>'6to cuatrimestre',
			'7'=>'7mo cuatrimestre',
			'8'=>'8vo cuatrimestre',
			'9'=>'9no cuatrimestre',
			'10'=>'10mo cuatrimestre')));
		echo $this->Form->input('career_id',array('label'=>'Carrera'));
		echo $this->Form->input('user_id',array('label'=>'Impartida por: '));
		echo $this->Form->end('Registrar Materia');
		echo $this->Form->input('id',array('type'=>'hidden'));
		


	?>
</fieldset>
<h3>Editar asistencia</h3>

<?php 
		echo $this->Form->create('User');
		echo $this->Form->hidden('Assist.id',array());
		echo $this->Form->hidden('Assist.user_id',array('type'=>'text'));
		echo $this->Form->hidden('Assist.course_id',array('type'=>'text'));
		echo $this->Form->hidden('Assist.grupo_id',array('type'=>'text'));
		echo $this->Form->input('Assist.note',array('label'=>'Nota de asistencia','div'=>'false','required'=>'true','placeholder'=>'motivo de modificacion')); 

		echo $this->Form->hidden('Assist.date_assist',array());
		echo $this->Form->input('Assist.status',array('type'=>'radio',
				'options'=>array('1'=>'Asistencia','2'=>'Retardo','3'=>'Falta'),
				'legend'=>false,
				));

		echo $this->Form->end('Actualizar asistencia');


?>
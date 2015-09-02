<h3>Editar calificacion</h3>

<?php 

	echo $this->Form->create('User');
	echo $this->Form->hidden('PartialScore.id');
	echo $this->Form->hidden('PartialScore.user_id',array('type'=>'text'));
	echo $this->Form->hidden('PartialScore.partial',array('type'=>'text'));
	echo $this->Form->hidden('PartialScore.course_id',array('type'=>'text'));
	echo $this->Form->hidden('PartialScore.grupo_id',array('type'=>'text'));
	echo $this->Form->hidden('PartialScore.career_id',array('type'=>'text'));
	echo $this->Form->input('PartialScore.note',array('type'=>'text','required'=>true,'placeholder'=>'motivo de modificacion'));
	echo $this->Form->input('PartialScore.final_score',array('type'=>'text','required'=>true));

	echo $this->Form->end('Actualizar calificacion');




?>
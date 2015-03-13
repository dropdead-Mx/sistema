
<fieldset>
	<legent>Editar Grupo</legent>

	<?php 
		echo $this->Form->create('Grupo');
		echo $this->Form->input('period',array('label'=>'Cuatrimestre'));
		echo $this->Form->input('Grupo.name',array('label'=>'Grupo'));
		echo $this->Form->input('career_id',array('label'=>'Carrera'));
		echo $this->Form->input('id',array('type'=>'hidden'));
		echo $this->Form->end('Actualizar grupo')
	?>
</fieldset>
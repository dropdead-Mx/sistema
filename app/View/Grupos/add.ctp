
<fieldset>
	<legent>agregar Grupo</legent>

	<?php 
		echo $this->Form->create('Grupo');
		echo $this->Form->input('period',array('label'=>'Cuatrimestre'));
		echo $this->Form->input('name',array('label'=>'Grupo'));
		echo $this->Form->input('career_id',array('label'=>'Carrera'));
		echo $this->Form->end('Gruardar grupo')
	?>
</fieldset>
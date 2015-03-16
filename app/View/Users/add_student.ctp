<div class="form">

<p>Agregar Estudiante</p>
<fieldset>
	<!-- <legend>Agregar Estudiante</legend> -->


	<?php 
		echo $this->Form->create('User',array('id'=>'formulario'));
		echo $this->Form->input ('name',array('label'=>'Nombre','id'=>'nombre'));
		echo $this->Form->input ('apat',array('label'=>'Apellido Paterno','id'=>'apater'));
		echo $this->Form->input ('amat',array('label'=>'Apellido Materno','id'=>'amater'));

		echo $this->Form->input ('email',array('label'=>'Correo Electronico'));
		echo $this->Form->input ('password',array('label'=>'Contraseña','id'=>'contra'));
		echo $this->Form->input('StudentProfile.career_id',array('label'=>'Carrera',
			'id'=>'career_id',
			'empty'=>'selecciona una carrera'));
		echo $this->Form->input('StudentProfile.grupo_id',array('label'=>'Grupo',
			'id'=>'grupo_id',
			'empty'=>'selecciona un grupo'));
		echo $this->Form->input ('StudentProfile.matricula',array('label'=>'Matricula','placeholder'=>'Formato de la matricula isc2014001'));
		// echo $this->Form->hidden ('StudentProfile.semester',array('label'=>'cuatrimestre'));

		echo $this->Form->hidden ('group_id',array('value'=> '8'));
		echo $this->Form->end('Registrar Estudiante');

?>

</fieldset>

</div>

<?php echo  $this->Html->script('scripts');?>

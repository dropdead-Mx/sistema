<div class="form">
<fieldset>
	<legend>Editar Perfil</legend>


	<?php 
		echo $this->Form->create('User',array('class'=>'editForm'));
		echo $this->Form->input ('name',array('label'=>'Nombre'));
		echo $this->Form->input ('apat',array('label'=>'Apellido Paterno'));
		echo $this->Form->input ('amat',array('label'=>'Apellido Materno'));
		echo $this->Form->input ('email',array('label'=>'Correo Electronico'));
		echo $this->Form->input ('password',array('label'=>'Contraseña'));
		echo $this->Form->input('StudentProfile.career_id',array('label'=>'Carrera',
			'id'=>'career_id',
			'empty'=>'selecciona una carrera'));
		echo $this->Form->input('StudentProfile.grupo_id',array('label'=>'Grupo',
			'id'=>'grupo_id'));
		echo $this->Form->input ('StudentProfile.matricula',array('label'=>'Matricula'));


		echo $this->Form->hidden ('grupo_id',array('value'=> '8'));
				echo $this->Form->input('id',array('type'=>'hidden'));
				echo $this->Form->input('StudentProfile.id',array('type'=>'hidden'));

		echo $this->Form->end('Registrar Estudiante');

?>

</fieldset>

</div>

<?php echo  $this->Html->script('scripts');?>

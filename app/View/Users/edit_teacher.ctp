<div class="form">
<fieldset>
	<legend>Editar Perfil</legend>


	<?php 

		echo $this->Form->create('User',array('class'=>'editForm','type'=>'file','novalidate'=>'novalidate'));
		echo $this->Form->input ('name',array('label'=>'Nombre'));
		echo $this->Form->input ('apat',array('label'=>'Apellido Paterno'));
		echo $this->Form->input ('amat',array('label'=>'Apellido Materno'));
		echo $this->Form->input ('email',array('label'=>'Correo Electronico'));
		echo $this->Form->input ('password',array('label'=>'Contraseña'));
		echo $this->Form->hidden ('group_id',array('value'=> '7'));
		echo $this->Form->input('EmployeeProfile.lv_education',array('label'=>'Nivel de estudios',
		'options'=> array('LIC.'=>'LIC.','ING.'=>'ING.','MTRO.'=>'MTRO.','DR.'=>'DR.'),
		'empty'=>'Seleccione el nivel'));
			echo $this->Form->input('EmployeeProfile.foto',array('type'=>'file','label'=>'Foto de perfil'));
		echo $this->Form->input('EmployeeProfile.foto_dir',array('type'=>'hidden'));

				echo $this->Form->input('id',array('type'=>'hidden'));
				echo $this->Form->input('EmployeeProfile.id',array('type'=>'hidden'));

		echo $this->Form->end('Editar Perfil Profesor');

?>

</fieldset>
<?php echo  $this->Html->script('scripts');?>

<div class="form">
<fieldset>
	<legend>Editar Perfil</legend>


	<?php 

		if($current_user['group_id']==5){
			$atributo=true;
			$label=false;
			$labelFoto=false;

		}else if ($current_user['group_id']==6){
			$atributo=false;
			$label='Contraseña';
			$labelFoto='Foto de perfil';
		}

		echo $this->Form->create('User',array('class'=>'editForm','type'=>'file','novalidate'=>'novalidate'));
		echo $this->Form->hidden('name',array('label'=>'Nombre'));
		echo $this->Form->hidden('apat',array('label'=>'Apellido Paterno'));
		echo $this->Form->hidden('amat',array('label'=>'Apellido Materno'));
		echo $this->Form->input ('email',array('label'=>'Correo Electronico'));
		echo $this->Form->input('password',array('label'=>$label,'hidden'=>$atributo,'id'=>'editaPassword'));
		echo $this->Form->hidden('group_id',array('value'=> '6'));
		echo $this->Form->hidden('EmployeeProfile.lv_education',array('label'=>'Nivel de estudios',
		'options'=> array('LIC.'=>'LIC.','ING.'=>'ING.','MTRO.'=>'MTRO.','DR.'=>'DR.'),
		'empty'=>'Seleccione el nivel'));
			echo $this->Form->input('EmployeeProfile.foto',array('type'=>'file','label'=>$labelFoto,'hidden'=>$atributo));
		echo $this->Form->input('EmployeeProfile.foto_dir',array('type'=>'hidden'));

				echo $this->Form->input('id',array('type'=>'hidden'));
				echo $this->Form->input('EmployeeProfile.id',array('type'=>'hidden'));

		echo $this->Form->end('Editar Perfil');

?>

</fieldset>
<?php echo  $this->Html->script('scripts');?>
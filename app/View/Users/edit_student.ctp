<div class="form">
<fieldset>
	<legend>Editar Perfil</legend>


	<?php 

		if($current_user['group_id']==6){
			$atributo=true;
			$label=false;
		}else if ($current_user['group_id']==8){
			$atributo=false;
			$label='Contraseña';
		}
		echo $this->Form->create('User',array('class'=>'editForm'));
		echo $this->Form->hidden ('name',array('label'=>'Nombre'));
		echo $this->Form->hidden ('apat',array('label'=>'Apellido Paterno'));
		echo $this->Form->hidden('amat',array('label'=>'Apellido Materno'));
		echo $this->Form->input ('email',array('label'=>'Correo Electronico'));
		echo $this->Form->input('password',array('label'=>$label,'hidden'=>$atributo));
		echo $this->Form->hidden('StudentProfile.career_id',array('label'=>'Carrera',
			'id'=>'career_id',
			'empty'=>'selecciona una carrera'));
		echo $this->Form->hidden('StudentProfile.grupo_id',array('label'=>'Grupo',
			'id'=>'grupo_id'));
		echo $this->Form->hidden('StudentProfile.matricula',array('label'=>'Matricula'));


		echo $this->Form->hidden ('grupo_id',array('value'=> '8'));
				echo $this->Form->input('id',array('type'=>'hidden'));
				echo $this->Form->input('StudentProfile.id',array('type'=>'hidden'));

		echo $this->Form->end('Modificar');

?>

</fieldset>

</div>

<?php echo  $this->Html->script('scripts');?>

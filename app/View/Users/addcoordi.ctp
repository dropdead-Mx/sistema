<div class="form">
<fieldset>
	<legend>Agregar coordinador</legend>


	<?php 
		// $selected=array();
		echo $this->Form->create('User',array('class'=>'addForm'));
		echo $this->Form->hidden('id');
		echo $this->Form->input ('name',array('label'=>'Nombre'));
		echo $this->Form->input ('apat',array('label'=>'Apellido Paterno'));
		echo $this->Form->input ('amat',array('label'=>'Apellido Materno'));
		echo $this->Form->input ('email',array('label'=>'Correo Electronico'));
		echo $this->Form->input ('password',array('label'=>'Contraseña'));
		echo $this->Form->hidden ('group_id',array('value'=> '6'));
		echo $this->Form->input('EmployeeProfile.lv_education',array('label'=>'Nivel de estudios',
		'options'=> array('LIC.'=>'LIC.','ING.'=>'ING.','MTRO.'=>'MTRO.','DR.'=>'DR.'),
		'empty'=>'Seleccione el nivel'));
		echo $this->Form->hidden('EmployeeProfile.picture',array('value'=>'/img'));

		// echo pr($careers);

		// $contador = count($careers);

		// for ($x=1; $x <= $contador ; $x++){
		// 	$value =$careers[$x+10];
		// 	echo $this->Form->input('Usrcareer.'.$x.'.career_id',array('value'=>$x+10,'hiddenField' => false,'label'=>$value,'type'=>'checkbox','multiple'=>true));
		// 	// echo ($careers[$x+10]);
		// }
		// echo $this->Form->hidden('UsersCareers.'.$x.'.user_id');
		// debug($careers);
		// echo $this->Form->select('Usrcareer.career_id',$careers,array('multiple'=>'checkbox'));

		echo $this->Form->end('Registrar coordinador');

?>

</fieldset>

</div>
<?php echo  $this->Html->script('scripts');?>

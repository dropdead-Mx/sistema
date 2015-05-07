<h3><?php echo $modulos[0]['Course']['name'].':  '.date('d-M-Y'); ?></h3>
<?php
$modulo=$modulos[0]['CourseModule']['id'];
$materia= $modulos[0]['Course']['id'];

// pr($modulos);
$hr=date("H:i:s");
$fecha=date("Y-m-d");
?>

<?php echo $this->Form->create('User');

?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Nota</th>
		<th>Asistencia</th>
		
	</tr>

<?php foreach($estudiantes as $k => $estudiante):?>
	<tr>
		<td><?php echo $estudiante['User']['name'] ?></td>
		<td>

	<?php 
		echo $this->Form->hidden('Assist.'.$k.'.user_id',array('value'=>$estudiante['User']['id']));
		echo $this->Form->hidden('Assist.'.$k.'.course_id',array('value'=>$materia));
		echo $this->Form->hidden('Assist.'.$k.'.grupo_id',array('value'=>$estudiante['StudentProfile']['grupo_id']));
		echo $this->Form->input('Assist.'.$k.'.note',array('label'=>false,'div'=>'false')); 


	?>
		
		</td>

		<td>

		<?php 

			echo $this->Form->hidden('Assist.'.$k.'.date_assist',array('value'=>$fecha));
			echo $this->Form->input('Assist.'.$k.'.status',array('type'=>'radio',
				'options'=>array('1'=>'Asistencia','2'=>'Retardo','3'=>'Falta'),
				'legend'=>false,
				));

		?>

		</td>

	</tr>

	

	<?php endforeach;?>

</table>

<?php echo $this->Form->end('Pasar Lista') ;?>
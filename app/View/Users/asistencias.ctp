<h3>Asistencia</h3>
<?php
// pr($modulos);
// pr($estudiantes);

$modulo=$modulos[0]['CourseModule']['id'];
// $hrmodulo=$modulos[0]['CourseModule']['start_time'];
// echo $hrmodulo;
$hr=date("H:i:s");
$fecha=date("Y-m-d");
// echo $fecha;
// echo sizeof($modulos);
// $semana=array(
// 	0=>'domingo',
// 	1=>'lunes',
// 	2=>'martes',
// 	3=>'miercoles',
// 	4=>'jueves',
// 	5=>'viernes',
// 	6=>'sabado');
// $dia = date("w");

// echo "hoy es : ".$semana[$dia];


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
		echo $this->Form->hidden('Assist.'.$k.'.module_course_id',array('value'=>$modulo));
		echo $this->Form->hidden('Assist.'.$k.'.grupo_id',array('value'=>$estudiante['StudentProfile']['grupo_id']));
		echo $this->Form->input('Assist.'.$k.'.note',array('label'=>false,'div'=>'false')); 


	?>
		
		</td>

		<td>

		<?php 

			echo $this->Form->hidden('Assist.'.$k.'.date_assist',array('value'=>$fecha));
			// $options=array('1'=>'Asistencia','2'=>'Retardo','3'=>'Falta');
			// $attributes=array('legend'=>false);
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
<h3>Modulos de la materia : <?php echo $modulos[0]['Course']['name']; ?></h3>

<?php 

// pr($modulos);
// debug($this->request->data);
// echo (sizeof($modulos));

echo $this->Form->create('Course');

// echo $course.$career;

?>

<table>


	<tbody id="myTbody">
	<tr>
		<th>Materia</th>
		<th>Carrera</th>
		<th>Dia de la semana</th>
		<th>Hora Inicio HH:MM AM/PM</th>
		<th>Hora Fin HH:MM AM/PM</th>
		<th>Acciones</th>
	</tr>
<?php 
foreach($modulos as $k => $modulo):
$course=$modulo['Course']['id'];
$coursename=$modulo['Course']['name'];
$career=$modulo['Career']['id'];?>
	<tr class='campoModulo'>

		<td>
		<?php echo $this->Form->input('CourseModule.'.$k.'.id',array('type'=>'hidden','value'=>$modulo['CourseModule']['id']));?>
		<?php echo $this->Form->input('CourseModule.'.$k.'.course_id',array('label'=>false,
		'options'=>array(
		$course =>$coursename)));?>	</td>
		<td><?php echo $this->Form->input('CourseModule.'.$k.'.career_id',array('label'=>false,
		'options'=>array(
		$career=>$modulo['Career']['name'])));?> </td>
		<td><?php  
		echo $this->Form->input('CourseModule.'.$k.'.day',array('label'=>false,
	'options'=>array('lunes'=>'lunes',
		'martes'=>'martes',
		'miercoles'=>'miercoles',
		'jueves'=>'jueves',
		'viernes'=>'viernes',),
	'empty'=>'Seleccione dia de la semana',
	'selected'=>$modulo['CourseModule']['day']
	)
	); ?></td>
		<td class='tInicio'><?php echo $this->Form->input('CourseModule.'.$k.'.start_time',array('label'=>false,'selected'=>$modulo['CourseModule']['start_time'])); ?></td>
		<td class='tFin'><?php echo $this->Form->input('CourseModule.'.$k.'.end_time',array('label'=>false,'selected'=>$modulo['CourseModule']['end_time'])); ?></th>
		<td><input type="button" value='Descartar' class='elimina'>
		<?php echo  $this->Form->postlink('Elimina',array('action'=>'eliminamodulos',$modulo['CourseModule']['id'],$modulo['CourseModule']['course_id']));?>
		</td>

	</tr>
<?php endforeach;?>

	
	
	</tbody>

</table>

<p class="agrega">Agregar Modulo</p>

<!-- segundo registro -->
<!-- agregar id y curso como input hiden -->


	
	
	</tbody>

</table>
<?php

 echo $this->Html->script('scripts');?>
<?php echo $this->Form->end('guardar');?>
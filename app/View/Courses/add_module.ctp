
<h3>Agregar modulos por semana para la materia:  <?php echo implode($courses); ?> </h3>



<?php echo $this->Form->create('Course',array('action'=>'addModule'));?>

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

	<tr class='campoModulo'>
		<td><?php echo $this->Form->input('CourseModule.0.course_id',array('label'=>false,'value'=>$courses));?>	</td>
		<td><?php echo $this->Form->input('CourseModule.0.career_id',array('label'=>false,'value'=>$careers));?> </td>
		<td><?php  
		echo $this->Form->input('CourseModule.0.day',array('label'=>false,
	'options'=>array('lunes'=>'lunes',
		'martes'=>'martes',
		'miercoles'=>'miercoles',
		'jueves'=>'jueves',
		'viernes'=>'viernes',),
	'empty'=>'Seleccione dia de la semana')); ?></td>
		<td class='tInicio'><?php echo $this->Form->input('CourseModule.0.start_time',array('label'=>false,'empty'=>' ')); ?></td>
		<td class='tFin'><?php echo $this->Form->input('CourseModule.0.end_time',array('label'=>false,'empty'=>' ')); ?></th>
		<td><input type="button" value='X' class='elimina'></td>

	</tr>


	
	
	</tbody>

</table>

<p class="agrega">Agregar materia</p>

<!-- segundo registro -->
<!-- agregar id y curso como input hiden -->


	
	
	</tbody>

</table>
<?php echo $this->Html->script('scripts');?>
<?php echo $this->Form->end('guardar');?>


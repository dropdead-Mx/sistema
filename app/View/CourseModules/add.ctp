<div class="modulosMateria">
<?php  $this->layout='default';
echo $this->Html->script('scripts')?>


<h3>Agregar Modulos de materia por semana</h3>

<style>
	div.day{
		display: inline-block;
		margin :4px 10px;
	}

	input[type='checkbox']{
		float: right;
		vertical-align: top;
		margin: 2px;
		cursor: pointer;
		
	}

	input.genera {
		width: 80px;
		font-size: 12px;
		padding:3px;
		cursor:pointer;
	}
	div.moduloDia {

	border:4px solid red;

	}

	p.agrega {
		cursor:pointer;
		border:2px solid black;
		padding :4px;
		width:100px;
	}
</style>




<?php 

echo $this->Form->create('CourseModule');
echo $this->Form->input('career_id',array('label'=>'Carrera',
			'id'=>'career_id',
			'empty'=>'selecciona una carrera'));

echo $this->Form->input('course_id',array('label'=>'Materia',
			'id'=>'course_id',
			'empty'=>'selecciona una materia'));

?>





<table>
	<caption>Modulos por semana</caption>

	<tbody id="myTbody">
	<tr>
		<th>Dia de la semana</th>
		<th>Hora Inicio</th>
		<th>Hora Fin </th>
		<th>Acciones</th>
	</tr>

	<tr class='campoModulo'>
		<td><?php  
		echo $this->Form->input('CourseModule.1.day',array('label'=>'Dia de la semana',
	'options'=>array('lunes'=>'lunes',
		'martes'=>'martes',
		'miercoles'=>'miercoles',
		'jueves'=>'jueves',
		'viernes'=>'viernes',),
	'empty'=>'Seleccione dia de la semana')); ?></td>
		<td class='tInicio'><?php echo $this->Form->input('CourseModule.1.start_time',array('label'=>'Hora de inicio HH:MM AM/PM','empty'=>' ')); ?></td>
		<td class='tFin'><?php echo $this->Form->input('CourseModule.1.end_time',array('label'=>'Hora de fin HH:MM AM/PM','empty'=>' ')); ?></th>
		<td><input type="button" value='X' class='elimina'></td>

	</tr>


	
	
	</tbody>

</table>


<p class="agrega">AgregarModulo</p>


<?php
echo $this->Form->end('Registrar Modulos de la materia');
?>






</div>



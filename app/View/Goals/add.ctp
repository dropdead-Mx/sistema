<h3>Agregar Criterios de evaluación</h3>

<!-- meter en una tabla  -->
<!-- Cuando se agregue el login se remueve la columna usuario y se deja como variable default -->
<?php 
	echo $this->Form->create('Goal');
?>


<table id="criterios">
	<tbody id="tb">
<tr>
	<th>Maestro</th>
	<th>Materia</th>
	<th>Descripcion</th>

	<th>Parcial</th>
	<th>Porcentaje</th>
</tr>
	

	<tr id="contenido">
		<td><?php echo $this->Form->input('user_id',array('label'=>false,'id'=>'user_id',
		'empty'=>'--Seleccione un profesor--')); ?></td>
		<td><?php 	echo $this->Form->input('course_id',
		array('empty'=>'--Seleccione una materia--',
			'id'=>'course_id',
			'label'=>false)); ?></td>
		<td><?php echo $this->Form->input('description',array('label'=>false)); ?></td>
		


	
		<td><?php echo $this->Form->input('parcial',array('label'=>false,
		'type'=>'select',
		'empty'=>'--Selecciona el periodo--',
		'options'=>array(
		'1'=>'1er Parcial',
		'2'=>'2do Parcial',
		'3'=>'3er Parcial',
		'4'=>'Cuatrimestral'))); ?></td>
		<td><?php echo $this->Form->input('percentage',array('label'=>false)); ?></td>
	</tr>


	</tbody>
</table>


<?php echo $this->Form->end('Guardar');?>


<?php  echo $this->Html->script('scripts');?>
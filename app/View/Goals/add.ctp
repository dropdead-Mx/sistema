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
	<th>Eliminar</th>
</tr>


<?php
 $z=0;

for( $x=0; $x <=$z ;$x++) {
// echo $x;
?>
		<tr class="contenido">
		<td><?php echo $this->Form->input('Goal.'.$x.'.user_id',array('label'=>false,'class'=>'user_id',
		'empty'=>'--Seleccione un profesor--')); ?></td>
		<td><?php 	echo $this->Form->input('Goal.0.course_id',
		array('empty'=>'--Seleccione una materia--',
			'class'=>'course_id',
			'label'=>false)); ?></td>
		<td><?php echo $this->Form->input('Goal.'.$x.'.description',array('label'=>false)); ?></td>
		


	
		<td><?php echo $this->Form->input('Goal.'.$x.'.parcial',array('label'=>false,
		'type'=>'select',
		'empty'=>'--Selecciona el periodo--',
		'options'=>array(
		'1'=>'1er Parcial',
		'2'=>'2do Parcial',
		'3'=>'3er Parcial',
		'4'=>'Cuatrimestral'))); ?></td>
		<td><?php echo $this->Form->input('Goal.'.$x.'.percentage',array('label'=>false)); ?></td>
		<td> <input type="button" class="elimina" value="Eliminar"> </td>
	</tr>
<?php 	
}?>


	</tbody>
</table>



<?php echo $this->Form->end('Guardar');?>


<?php  echo $this->Html->script('scripts');?>

<button id="aumenta">+</button>

<script>
	
</script>
<h2>Listado de carreras</h2>

<table>
	<tr>
		<th>Id</th>
		<th>Carrera</th>
		<th>Abreviatura</th>

		<th>Acciones</th>
	</tr>

	<!-- la variable carreras se define en el metodo set del  controlador -->
	<?php foreach($carreras as $k => $carrera): ?>
		<tr> 
		<td><?php echo $carrera ['Career']['id'] ?></td> 
		<td><?php echo $carrera ['Career']['name'] ?></td> 
		<td><?php echo $carrera ['Career']['abrev'] ?></td> 


		<td>
			<?php echo $this->Html->link('Editar',array('action'=> 'edit',$carrera['Career']['id'])); ?>
			&nbsp

			<?php echo $this->Form->postlink('Eliminar',array('action' => 'delete',$carrera['Career']['id']),array(
					'confirm'=> 'Realmente quiere eliminar esta carrera'));
			?>

		</td>

	</tr>

<?php endforeach; ?>
</table>

<?php  echo $this->Html->link('Agregar Carrera',array('action'=> 'add')); ?>


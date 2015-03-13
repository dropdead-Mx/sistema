<h2>Tipos de usuarios</h2>


<table>
	<tr>
		<th>id</th>
		<th>Nombre</th>
		<th>Creado</th>
		<th>Modificado</th>
		<th>Acciones</th>
	</tr>

	<?php foreach($grupos as $k => $grupo): ?>
		<tr>
			<td><?php echo $grupo['Group']['id'] ?></td>
			<td><?php echo $grupo['Group']['name'] ?></td>
			<td><?php echo $grupo['Group']['created'] ?></td>
			<td><?php echo $grupo['Group']['modified'] ?></td>
			<td>
				 <?php echo $this->Html->link('Editar',array('action'=>'edit',$grupo['Group']['id']));?>
				 &nbsp

				 <?php echo $this->Form->postlink('Eliminar',array('action'=>'delete',$grupo['Group']['id']),array('confirm'=>'desea eliminar esta categoria'));?>

			</td>


		</tr>

	<?php endforeach;?>
</table>
<h2>Listado de grupos</h2>

<table>
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Cuatrimestre</th>
		<th>Carrera</th>
		<th>Acciones</th>
		</tr>


<?php foreach($grupos as $z => $grupo):?>

	<tr>
		<td><?php echo $grupo['Grupo']['id']?></td>
		<td><?php echo $grupo['Grupo']['name']?></td>
		<td><?php echo $grupo['Grupo']['period']?></td>
		<td><?php echo $grupo['Career']['abrev']?></td>
		<td>
			<?php echo $this->Html->link('Editar',array('action'=>'edit',$grupo['Grupo']['id']));?>
			&nbsp
			<?php echo $this->Form->postlink('Eliminar',array('action'=>'delete',$grupo['Grupo']['id']),array('confirm'=>'Deseas eliminar este grupo?'));?>
		</td>
	</tr>

<?php endforeach;?>


</table>
<?php echo $this->Html->link('Agregar Grupo',array('action'=>'add')); ?>

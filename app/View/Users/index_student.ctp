<h2>Listado de estudiantes</h2>

<table>
	
	<tr>
		<th>id</th>
		<th>Nombre</th>
		<th>Carrera</th>
		<th>Grupo</th>
		<th>Matricula</th>
		<th>Email</th>
		<th>password</th>

		<th>Acciones</th>
	</tr>

<?php foreach($estudiantes as $k =>$estudiante ): ?>
	<tr>
		<td><?php echo $estudiante ['User']['id'] ?></td>
		<td><?php echo $estudiante ['User']['name'] ?></td>
		
		<td><?php echo $estudiante['Career']['name']?></td>
		<td><?php echo $estudiante['Grupo']['name']?></td>
		<td><?php echo $estudiante ['StudentProfile']['matricula'] ?></td>
		<td><?php echo $estudiante ['User']['email'] ?></td>
		<td><?php echo $estudiante ['User']['password'] ?></td>

		<td>
			<?php echo $this->Html->link('Editar', array('action'=>'editStudent',$estudiante['User']['id'])); ?>
			&nbsp
			<?php echo $this->Form->postlink('Eliminar',array('action'=>'deleteStudent',$estudiante['User']['id']),array('confirm'=>'deceas Eliminar al estudiante')); ?>
		</td>



	</tr>

<?php endforeach;?>


</table>

<?php echo $this->Html->link('agregar estudiante', array('controller'=>'users','action'=>'addStudent')); ?>
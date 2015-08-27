<h2>Listado de maestros</h2>

<table>
	
	<tr>
		<!-- <th>id</th> -->
		<th>Nombre </th>
		


		<th>Email</th>
	
	<th>Nivel de educacion</th>
	<th>Foto</th>
		<th>Materias que imparte:</th>
		<th>Acciones</th>
	</tr>

<?php foreach($maestros as $k =>$maestro ): ?>
	<tr>
		
		<td><?php echo $maestro ['User']['name'] ?></td>
	

		<td><?php echo $maestro ['User']['email'] ?></td>
		
		<td><?php echo $maestro ['EmployeeProfile']['lv_education'] ?></td>

		<td><?php echo $this->Html->image('../files/employee_profile/foto/'.$maestro['EmployeeProfile']['foto_dir'].'/'.'thumb_'.$maestro['EmployeeProfile']['foto']) ?></td>
	
		<td>
			<?php 

				foreach ($materiasImparte as $key => $impartiendo) {
					if($impartiendo['teacher_id'] == $maestro['User']['id']){
						echo '<p>'.$impartiendo['course_name'].'</p>';

					
					}

				}

			?>
		</td>

		<td>
			<?php echo $this->Html->link('Editar', array('action'=>'editTeacher',$maestro['User']['id'])); ?>
			&nbsp
			<?php echo $this->Form->postlink('Eliminar',array('action'=>'deleteTeacher',$maestro['User']['id']),array('confirm'=>'deceas Eliminar al maestro')); ?>
		</td>



	</tr>

<?php endforeach;?>


</table>

<?php echo $this->Html->link('agregar maestro', array('controller'=>'users','action'=>'addTeacher')); ?>
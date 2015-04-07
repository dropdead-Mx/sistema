<h3>coordinadores Universidad Dorados</h3>

<table>
	<tr>
		<th>Nombre</th>
		<!-- <th>Apellidos</th> -->
		<th>Asignar Carreras</th>
		<th>Editar</th>
	</tr>

<?php foreach($coordinators as $k => $coordi):?>
	<tr>

	<td><?php echo $coordi['EmployeeProfile']['lv_education'].' '.$coordi['User']['name'] ?></td>
	
	<td><?php echo $this->Html->link('Asignar carreras',array('action'=>'assigncareers',$coordi['User']['id'])); ?></td>
	<td><?php ?></td>
		
	</tr>

<?php endforeach;?>
	

</table>
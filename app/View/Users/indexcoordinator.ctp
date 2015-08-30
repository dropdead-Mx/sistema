<div class="coordinadores">
	
<h3>coordinadores Universidad Dorados</h3>

<table>
	<tr>
		<th>Nombre</th>
		<!-- <th>Apellidos</th> -->
		<th>Foto de perfil</th>
		<th>Asignar Carreras</th>
		<th>Editar</th>
	</tr>

<?php foreach($coordinators as $k => $coordi):?>
	<tr>

	<td><?php echo $coordi['EmployeeProfile']['lv_education'].' '.$coordi['User']['name'] ?></td>
	<td><?php echo $this->Html->image('../files/employee_profile/foto/'.$coordi['EmployeeProfile']['foto_dir'].'/'.'thumb_'.$coordi['EmployeeProfile']['foto']) ?></td>
	
	<td><?php echo $this->Html->link('Asignar carreras',array('action'=>'assigncareers',$coordi['User']['id'])); ?></td>
	<td>
	<?php echo $this->Html->link('Ver carreras',array('action'=>'vercarreras',$coordi['User']['id']))?>

	<?php echo $this->Html->link(' Editar perfil', array('action'=>'editacoordinador',$coordi['User']['id'])); ?>
	<?php echo $this->Form->postlink('Eliminar',array('action'=>'eliminarcoordi',$coordi['User']['id']),array('confirm'=>'Deceas eliminar a este coordinador ?')); ?>

	</td>
		
	</tr>

<?php endforeach;?>
	

</table>
</div>
<h2>Listado De Materias</h2>

<table>
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Cuatrimestre</th>
		<th>Carrera</th>
		<th>Impartida por</th>
		<th>Acciones</th>
	</tr>

	<?php foreach($materias as $k => $materia): ?>
			
		<tr>
			<td><?php echo $materia ['Course']['id'] ?></td>
			<td><?php echo $materia ['Course']['name']?></td>
			<td><?php echo $materia['Course']['semester']?></td>
			<td><?php echo $this->Html->link($materia['Career']['abrev'],array('controller'=>'careers','action'=>'view',$materia['Career']['id']));?></td>
			<td><?php echo $this->Html->link($materia['User']['name'],array('controller'=>'employees','action'=>'view',$materia['User']['id']));?> </td>



			
			<td><?php echo $this->Html->link('Editar',array('action'=>'edit',$materia['Course']['id'])); ?>
			 &nbsp
				
				<?php echo $this->Form->postlink('Eliminar',array('action'=>'delete',$materia['Course']['id']),array('confirm'=>'deceas eliminar esta materia?')); ?>
			 &nbsp

			 <?php echo $this->Html->link('Agregar Modulos',array('action'=>'addModule',$materia['Course']['id'],$materia['Course']['career_id'])); ?>


			 </td>
		</tr>

	<?php endforeach;?>
</table>

<br>


<?php  echo $this->Html->link('Agregar materia',array('action'=>'add')); ?>
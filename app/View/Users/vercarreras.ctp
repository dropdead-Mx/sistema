<h2>Carreras Administradas por el cordinador :<?php echo implode($nombre);?></h2>

<?php 
//pr($career); ?>

<table>
	<tr>
		<th>id</th>
		
		<th>Carrera</th>
		<th>Eliminar carrera</th>
	</tr>


	<?php foreach($todo as $k => $administra): 
	// echo $k;

	?>
		
		<tr>
			<td><?php echo $administra['Usrcareer']['id'];?></td>
			<td> <?php echo $career[$administra['Usrcareer']['career_id']];?> </td>
			<td> <?php echo $this->Form->postlink('Quitar carrera',array('action'=>'eliminacc',$administra['Usrcareer']['id'],$administra['Usrcareer']['user_id']),array('confirm'=>'Deceas dar de baja el control de la carrera: '.$career[$administra['Usrcareer']['career_id']].' para este usuario'));?></td>
		</tr>

<?php endforeach;?>

</table>


<?php echo $this->Html->link('Volver atras',array('controller'=>'users','action'=>'indexcoordinator'));?>
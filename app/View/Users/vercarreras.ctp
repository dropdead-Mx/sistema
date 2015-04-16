<h2>Carreras Administradas por el cordinador :<?php echo implode($nombre);?></h2>

<table>
	<tr>
		<th>id</th>
		
		<th>Carrera</th>
		<th>Eliminar carrera</th>
	</tr>


	<?php foreach($career as $k => $administra): 
	// echo $k;

	?>
		
		<tr>
			<td><?php echo $todo[$k]['Usrcareer']['id'];?></td>
			<td> <?php echo $administra['Career']['name'];?> </td>
			<td> <?php echo $this->Form->postlink('Quitar carrera',array('action'=>'eliminacc',$todo[$k]['Usrcareer']['id'],$todo[$k]['Usrcareer']['user_id']),array('confirm'=>'Deceas dar de baja el control de la carrera: '.$administra['Career']['name'].' para este usuario'));?></td>
		</tr>

<?php endforeach;?>

</table>


<?php echo $this->Html->link('Volver atras',array('controller'=>'users','action'=>'indexcoordinator'));?>
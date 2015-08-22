<h3>Evaluacion para la materia : <?php echo implode($materia);?> del grupo <?php echo$gpo[0]['Grupo']['name'];?></h3>



<?php echo $this->Form->create('User',array('action'=>'calificar','id'=>'calificacionesPar'));?>


<table>
<?php foreach($estudiantes as $k => $estudiante): ?>
	<?php $student=$estudiante['User']['id']; ?>
	<tr>

	<th>
	<?php echo $estudiante['User']['name'];?>
	</th>


	<?php foreach($critdevaluacion as $X => $crtev):?>

	<th>
	<?php echo $crtev['Goal']['description']; ?>
	</th>



	<?php endforeach;?>

</tr>

<tr>
	<td>
	<?php echo 'Parcial #'.$crtev['Goal']['parcial']; ?>
	</td>
	<?php foreach($critdevaluacion as $X => $crtev):?>
	<td   class='porcentaje' data-porcentaje="<?php echo $crtev['Goal']['percentage'];?>"  >
		<?php 

			$id=$crtev['Goal']['id'];

			echo $this->Form->hidden('Obtainedgoal.'.($k.$X).'.goal_id',array('label'=>false,'value'=>$id,'class'=>'calf'));
			echo $this->Form->hidden('Obtainedgoal.'.($k.$X).'.user_id',array('label'=>false,'value'=>$student,'class'=>'calf'));
			echo $this->Form->input('Obtainedgoal.'.($k.$X).'.percentage_obtained',array('label'=>false,'div'=>false,'class'=>'calf','required'=>true
			
				));
		?>
	</td>
	<?php endforeach;?>

</tr>

<?php endforeach;?>



</table>


<?php echo $this->Form->end('Guardar Calificaciones'); ?>
<?php echo $this->Html->script('scripts');?>
<!-- <button class='xd3'>XDDD</button> -->
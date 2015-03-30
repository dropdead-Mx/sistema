<h3>Evaluacion para la materia :</h3>

<?php echo $this->Form->create('User',array('action'=>'calificar'));?>
<table>
	<tr>
	<th>Alumno</th>
	</tr>


	<?php foreach($estudiantes as $k => $estudiante): ?>
		<tr>
			<td>
			<?php 

			$student=$estudiante['User']['id'];
			
			echo $estudiante['User']['name'].'<br>'?>

			&nbsp

			<?php foreach($critdevaluacion as $X => $crtev):?>

				<?php 
				$criterio=$crtev['Goal']['description'];
				$id=$crtev['Goal']['id'];


				 
				
				echo $this->Form->hidden('Obtainedgoal.'.$k.'.goal_id',array('label'=>false,'value'=>$id));
				echo $this->Form->hidden('Obtainedgoal.'.$k.'.user_id',array('label'=>false,'value'=>$student));
				echo $this->Form->input('Obtainedgoal.'.$k.'.percentage_obtained',array('label'=>false));?>


			<?php endforeach;?>
			</td>
		</tr>

	<?php endforeach;?>

</table>
<?php echo $this->Form->end('Guardar Calificaciones'); ?>

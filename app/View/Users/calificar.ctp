<h3>Evaluacion para la materia : <?php echo $materia[0]['Course']['name'];?> del grupo <?php echo$gpo[0]['Grupo']['name'];?></h3>

<?php

// pr($estudiantes);
// pr($materia);

?>


<?php echo $this->Form->create('User',array('id'=>'calificacionesPar'));?>


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

<tr class="rowInfo">
	<td>
	<?php echo 'Parcial #'.$crtev['Goal']['parcial']; ?>
	</td>
	<?php foreach($critdevaluacion as $X => $crtev):?>
	<td   class='porcentaje' data-porcentaje="<?php echo $crtev['Goal']['percentage'];?>"  >
		<?php 

			$id=$crtev['Goal']['id'];

			echo $this->Form->hidden('Obtainedgoal.'.($k.$X).'.goal_id',array('label'=>false,'value'=>$id,'class'=>'calf'));
			echo $this->Form->hidden('Obtainedgoal.'.($k.$X).'.user_id',array('label'=>false,'value'=>$student,'class'=>'calf'));
			echo $this->Form->input('Obtainedgoal.'.($k.$X).'.percentage_obtained',array('label'=>false,'div'=>false,'class'=>'calf','required'=>true,'placeholder'=>'De 0 a 100%','type'=>'text'));

		?>

	</td>

	<?php endforeach;?>
<td hidden>
		
	<!-- <input type="text" class="total"> -->
	<?php 

	echo $this->Form->hidden('PartialScore.'.$k.'.user_id',array('value'=>$student,'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.partial',array('value'=>$parcial,'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.course_id',array('value'=>$materia[0]['Course']['id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.grupo_id',array('value'=>$estudiante['StudentProfile']['grupo_id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.career_id',array('value'=>$estudiante['StudentProfile']['career_id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.final_score',array('type'=>'text','class'=>'total','label'=>false,'div'=>false,));



	?>
	</td>
</tr>


<?php endforeach;?>


	

</table>

<div class="error">
	<p class="mensajeError"></p>
</div>


<?php echo $this->Form->end('Guardar Calificaciones'); ?>
<?php echo $this->Html->script('scripts');?>
<!-- <button class='xd3'>XDDD</button> -->
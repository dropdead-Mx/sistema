<h3>Calificar cuatrimestral de la materia: <?php echo $materia[0]['Course']['name'];?></h3>

<?php 
// pr($sumaParciales); 
?>
<?php  echo $this->Form->create('User',array('id'=>'formularioCuatrimestral'));?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Calificacion</th>
	</tr>


<?php foreach ($alumnos as $k => $alumno):?>
	<tr>

	<td>
		<?php echo $alumno['User']['name'];?>
	</td>

	<td>
		<?php 

		foreach($sumaParciales as $w => $derecho){
			
			if($w ==$alumno['User']['id']){

			$aplica=$derecho['suma_parciales'];
			if($aplica >= 18){
				$estatus=false;
			}else{
				$estatus=true;
			}
			}
		}

			echo $this->Form->hidden('PartialScore.'.$k.'.user_id',array('value'=>$alumno['User']['id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.partial',array('value'=>4,'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.course_id',array('value'=>$materia[0]['Course']['id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.grupo_id',array('value'=>$alumno['StudentProfile']['grupo_id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.career_id',array('value'=>$alumno['StudentProfile']['career_id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->input('PartialScore.'.$k.'.final_score',array('type'=>'text','class'=>'total','label'=>false,'div'=>false,'placeholder'=>'inserte la calificacion Ej. 8.6','disabled'=>$estatus));

		?>
		<!-- linea para que una ves que se califica el cuatrimestral se inserte en la base de datos la calificacion final usando el data -->
		<input type="text" class="calificacionTresParciales" data-califParciales='<?php echo $aplica; ?>' hidden>
	</td>


	</tr>

<?php endforeach; ?>
</table>

<?php echo $this->Form->end('Calificar');?>
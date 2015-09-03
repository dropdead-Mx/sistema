<h3>Calificar cuatrimestral de la materia: <?php echo $materia[0]['Course']['name'];?></h3>

<?php 
// pr($sumaParciales); 
?>
<?php  echo $this->Form->create('User',array('id'=>'formularioCuatrimestral'));?>

<div class="error">
	
</div>
<table>
	<tr>
		<th>Nombre</th>
		<th>Calificacion</th>
	</tr>


<?php foreach ($alumnos as $k => $alumno):?>
	<tr class="filaCuatrimestral">

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
			$calificacion=$aplica/3;
			}
		}

			echo $this->Form->hidden('PartialScore.'.$k.'.user_id',array('value'=>$alumno['User']['id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.partial',array('value'=>4,'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.course_id',array('value'=>$materia[0]['Course']['id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.grupo_id',array('value'=>$alumno['StudentProfile']['grupo_id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.$k.'.career_id',array('value'=>$alumno['StudentProfile']['career_id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->input('PartialScore.'.$k.'.final_score',array('type'=>'text','class'=>'total','label'=>false,'div'=>false,'placeholder'=>'inserte la calificacion Ej. 8.6','disabled'=>$estatus ,'required'=>true,'data-califParciales'=>$calificacion));

	//<------ Separacion para calificacion final --->

		echo $this->Form->hidden('PartialScore.'.'1'.$k.'.user_id',array('value'=>$alumno['User']['id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.'1'.$k.'.partial',array('value'=>5,'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.'1'.$k.'.course_id',array('value'=>$materia[0]['Course']['id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.'1'.$k.'.grupo_id',array('value'=>$alumno['StudentProfile']['grupo_id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.'1'.$k.'.career_id',array('value'=>$alumno['StudentProfile']['career_id'],'type'=>'text','label'=>false,'div'=>false,));
	echo $this->Form->hidden('PartialScore.'.'1'.$k.'.final_score',array('type'=>'text','class'=>'calificacion','label'=>false,'div'=>false));

	

		?>
		
	</td>



	</tr>

<?php endforeach; ?>
</table>


<?php echo $this->Form->end('Calificar');?>


<?php echo $this->Html->script('scripts');?>
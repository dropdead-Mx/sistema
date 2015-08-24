<h3>Asignacion de fechas para examenes</h3>
<?php echo $this->Form->create('add'); ?>
<table>

<tr>
	<th>Asignatura</th>
	<th>1ER PARCIAL</th>
	<th>2DO PARCIAL</th>
	<th>3ER PARCIAL</th>
	<th>CUATRIMESTRAL</th>
	<th>EXTRAORDINARIO</th>
</tr>



<?php 


foreach($materias as $k => $materia):

?>
<tr>
	<td> 
	<p><?php echo $materia['Course']['name'];?> </p>
	<p>
		
	<?php 
		if(!isset($maestro)){
			echo "Sin maestro asignado aun.";
		}else if (isset($maestro[0]['User']['name'])){
			 echo $maestro[0]['User']['name'];
		}
	 ?>

	</p>
	 </td>

	<td> 
	<?php
		echo $this->Form->hidden('Exam.'.($k.'1').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'1').'.partial',array('value'=>1));
		echo $this->Form->hidden('Exam.'.($k.'1').'.grupo_id',array('value'=>$grupo));

		echo $this->Form->input('Exam.'.($k.'1').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker ','type'=>'text'));

		echo $this->Form->input('Exam.'.($k.'1').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24', 'class'=>'inputHoras','empty'=>'--'));
		echo $this->Form->input('Exam.'.($k.'1').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24','class'=>'inputHoras','empty'=>'--'));


	 ?> 
	 </td>


	<td> 	<?php

			echo $this->Form->hidden('Exam.'.($k.'2').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'2').'.partial',array('value'=>2));
		echo $this->Form->hidden('Exam.'.($k.'2').'.grupo_id',array('value'=>$grupo));
		echo $this->Form->input('Exam.'.($k.'2').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker','type'=>'text'));
		echo $this->Form->input('Exam.'.($k.'2').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24','class'=>'inputHoras','empty'=>'--'));
		echo $this->Form->input('Exam.'.($k.'2').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24','class'=>'inputHoras','empty'=>'--'));



	 ?>  </td>

	<td> 	<?php

				echo $this->Form->hidden('Exam.'.($k.'3').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'3').'.partial',array('value'=>3));
		echo $this->Form->hidden('Exam.'.($k.'3').'.grupo_id',array('value'=>$grupo));
		echo $this->Form->input('Exam.'.($k.'3').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker','type'=>'text'));
		echo $this->Form->input('Exam.'.($k.'3').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24','class'=>'inputHoras','empty'=>'--'));
		echo $this->Form->input('Exam.'.($k.'3').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24','class'=>'inputHoras','empty'=>'--'));



	 ?>  </td>


	<td> 	<?php

				echo $this->Form->hidden('Exam.'.($k.'4').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'4').'.partial',array('value'=>4));
		echo $this->Form->hidden('Exam.'.($k.'4').'.grupo_id',array('value'=>$grupo));
		echo $this->Form->input('Exam.'.($k.'4').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker','type'=>'text'));
		echo $this->Form->input('Exam.'.($k.'4').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24','class'=>'inputHoras','empty'=>'--'));
		echo $this->Form->input('Exam.'.($k.'4').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24','class'=>'inputHoras','empty'=>'--'));



	 ?>  </td>


	<td>
	<?php
		echo $this->Form->hidden('Exam.'.($k.'5').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'5').'.partial',array('value'=>5));
		echo $this->Form->hidden('Exam.'.($k.'5').'.grupo_id',array('value'=>$grupo));

		echo $this->Form->input('Exam.'.($k.'5').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker','type'=>'text'));
		echo $this->Form->hidden('Exam.'.($k.'5').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24','class'=>'inputHoras','empty'=>'--'));
		echo $this->Form->hidden('Exam.'.($k.'5').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24','class'=>'inputHoras','empty'=>'--'));


	 ?>  </td>
</tr>

<?php endforeach;?>
	
</table>

<?php echo $this->Html->script('scripts');?>


<?php echo $this->Form->end('Registrar examenes');?>
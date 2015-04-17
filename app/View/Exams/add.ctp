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

<script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy-mm-dd',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$(".datepicker").datepicker();
});
</script>

<?php 


foreach($materias as $k => $materia):

?>
<tr>
	<td> <?php echo $materia['Course']['name'];?> 
	<p></p>
	<?php echo $materia['User']['name']; ?> </td>

	<td> 
	<?php
		echo $this->Form->hidden('Exam.'.($k.'1').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'1').'.partial',array('value'=>1));
		echo $this->Form->input('Exam.'.($k.'1').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker','type'=>'text'));

		echo $this->Form->input('Exam.'.($k.'1').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24'));
		echo $this->Form->input('Exam.'.($k.'1').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24'));


	 ?> 
	 </td>


	<td> 	<?php

			echo $this->Form->hidden('Exam.'.($k.'2').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'2').'.partial',array('value'=>2));
		echo $this->Form->input('Exam.'.($k.'2').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker','type'=>'text'));
		echo $this->Form->input('Exam.'.($k.'2').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24'));
		echo $this->Form->input('Exam.'.($k.'2').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24'));



	 ?>  </td>

	<td> 	<?php

				echo $this->Form->hidden('Exam.'.($k.'3').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'3').'.partial',array('value'=>3));
		echo $this->Form->input('Exam.'.($k.'3').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker','type'=>'text'));
		echo $this->Form->input('Exam.'.($k.'3').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24'));
		echo $this->Form->input('Exam.'.($k.'3').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24'));



	 ?>  </td>


	<td> 	<?php

				echo $this->Form->hidden('Exam.'.($k.'4').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'4').'.partial',array('value'=>4));
		echo $this->Form->input('Exam.'.($k.'4').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker','type'=>'text'));
		echo $this->Form->input('Exam.'.($k.'4').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24'));
		echo $this->Form->input('Exam.'.($k.'4').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24'));



	 ?>  </td>


	<td>
	<?php
		echo $this->Form->hidden('Exam.'.($k.'5').'.course_id',array('value'=>$materia['Course']['id']));
		echo $this->Form->hidden('Exam.'.($k.'5').'.partial',array('value'=>5));

		echo $this->Form->input('Exam.'.($k.'5').'.fecha',array('label'=>'Fecha de aplicacion','div'=>false,'class'=>'datepicker','type'=>'text'));
		echo $this->Form->hidden('Exam.'.($k.'5').'.start_time',array('label'=>'Hora inicio','div'=>false,'timeFormat' => '24'));
		echo $this->Form->hidden('Exam.'.($k.'5').'.end_time',array('label'=>'Hora fin','div'=>false,'timeFormat' => '24'));


	 ?>  </td>
</tr>

<?php endforeach;?>
	
</table>


<?php echo $this->Form->end('Registrar examenes');?>
<h3>Fechas de examenes</h3>

<?php 

// pr($examenes);
// pr($materia);

// echo sizeof($examenes);
$texto='No asignado aun';

?>

<table>
	<tr>
		<th>Materia</th>
		<th>1er Parcial</th>
		<th>2do Parcial</th>
		<th>3er Parcial</th>
		<th>Cuatimestral</th>
		<th>Extra</th>
	</tr>


<?php foreach($materia as $k => $materias): ?>
	<tr>
		<td><?php echo $materias['Course']['name']?></td>
		<td><?php 

		if(isset($examenes[$k][0])){

		echo '<strong>Fecha : </strong>'.$examenes[$k][0]['Exam']['fecha'];
		echo '<br>';
		echo '<strong>Hora de inicio : </strong>'.$examenes[$k][0]['Exam']['start_time'];

		}else {
			// echo '<strong>Fecha : </strong>'.$texto;
			echo "<strong>Datos de examen no asignados aun</strong>";
		}

		
		?></td>
		<td><?php 

		if(isset($examenes[$k][1])){

		echo '<strong>Fecha : </strong>'.$examenes[$k][1]['Exam']['fecha'];
		echo '<br>';
		echo '<strong>Hora de inicio : </strong>'.$examenes[$k][1]['Exam']['start_time'];

		}else {
			// echo '<strong>Fecha : </strong>'.$texto;
			echo "<strong>Datos de examen no asignados aun</strong>";
		}


		?></td>
		<td><?php 

	if(isset($examenes[$k][2])){

		echo '<strong>Fecha : </strong>'.$examenes[$k][2]['Exam']['fecha'];
		echo '<br>';
		echo '<strong>Hora de inicio : </strong>'.$examenes[$k][2]['Exam']['start_time'];

		}else {
			// echo '<strong>Fecha : </strong>'.$texto;
			echo "<strong>Datos de examen no asignados aun</strong>";
		}

		?></td>
		<td><?php 

	if(isset($examenes[$k][3])){

		echo '<strong>Fecha : </strong>'.$examenes[$k][3]['Exam']['fecha'];
		echo '<br>';
		echo '<strong>Hora de inicio : </strong>'.$examenes[$k][3]['Exam']['start_time'];

		}else {
			// echo '<strong>Fecha : </strong>'.$texto;
			echo "<strong>Datos de examen no asignados aun</strong>";
		}

		?></td>

		<td><?php 

			if(isset($examenes[$k][4])){

		echo '<strong>Fecha : </strong>'.$examenes[$k][4]['Exam']['fecha'];
		echo '<br>';
		

		}else {
			// echo '<strong>Fecha : </strong>'.$texto;
			echo "<strong>Datos de examen no asignados aun</strong>";
		}


		?></td>
	</tr>

<?php endforeach; ?>




</table>


<?php echo $this->Html->link('Atras',array('action'=>'alumno',$id));?>
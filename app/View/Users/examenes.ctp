<h3>Fechas de examenes</h3>

<?php 

// pr($examenes);
// pr($materia);


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

		echo '<strong>Fecha : </strong>'.$examenes[$k][0]['Exam']['fecha'];
		echo '<br>';

		echo '<strong>Hora de inicio : </strong>'.$examenes[$k][0]['Exam']['start_time'];
		?></td>
		<td><?php 

		echo '<strong>Fecha : </strong>'.$examenes[$k][1]['Exam']['fecha'];
		echo '<br>';

		echo '<strong>Hora de inicio : </strong>'.$examenes[$k][1]['Exam']['start_time'];



		?></td>
		<td><?php 

				echo '<strong>Fecha : </strong>'.$examenes[$k][2]['Exam']['fecha'];
		echo '<br>';

		echo '<strong>Hora de inicio : </strong>'.$examenes[$k][2]['Exam']['start_time'];

		?></td>
		<td><?php 

				echo '<strong>Fecha : </strong>'.$examenes[$k][3]['Exam']['fecha'];
		echo '<br>';

		echo '<strong>Hora de inicio : </strong>'.$examenes[$k][3]['Exam']['start_time'];

		?></td>

		<td><?php 

				echo '<strong>Fecha : </strong>'.$examenes[$k][4]['Exam']['fecha'];
		echo '<br>';

			


		?></td>
	</tr>

<?php endforeach; ?>




</table>


<?php echo $this->Html->link('Atras',array('action'=>'alumno',$id));?>
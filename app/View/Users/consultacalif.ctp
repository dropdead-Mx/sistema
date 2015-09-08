<h3>Consulta de calificaciones de la materia: <?php echo $materia[0]['Course']['name'];?>  grupo <?php echo $gpo[0]['Grupo']['name'];?> </h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Primer parcial</th>
		<th>Segundo parcial</th>
		<th>tercer parcial</th>
		<th>Cuatrimestral</th>
		<th>Final</th>
	</tr>


	<?php  foreach ($estudiantes as $k => $alumno){
		$id=$alumno['User']['id'];
		

		
		echo '<tr>';

		echo '<td>'.$alumno['User']['name'].'</td>';

		if(isset($calificaciones[$k][0]['PartialScore'])){
			echo '<td>'.$calificaciones[$k][0]['PartialScore']['final_score'].'</td>';
		}else {
			echo '<td>No calificado aun</td>';
		}

		if(isset($calificaciones[$k][1]['PartialScore'])){
			echo '<td>'.$calificaciones[$k][1]['PartialScore']['final_score'].'</td>';
		}else {
			echo '<td>No calificado aun</td>';
		}

		if(isset($calificaciones[$k][2]['PartialScore'])){
			echo '<td>'.$calificaciones[$k][2]['PartialScore']['final_score'].'</td>';
		}else {
			echo '<td>No calificado aun</td>';
		}

		if(isset($calificaciones[$k][3]['PartialScore'])){
			echo '<td>'.$calificaciones[$k][3]['PartialScore']['final_score'].'</td>';
		}else {
			echo '<td>No calificado aun</td>';
		}
		if(isset($calificaciones[$k][4]['PartialScore'])){
			echo '<td>'.$calificaciones[$k][4]['PartialScore']['final_score'].'</td>';
		}else {
			echo '<td>No calificado aun</td>';
		}



		echo '</tr>';
	}




	?>




</table>
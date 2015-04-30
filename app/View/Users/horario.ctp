<h3>Horario de clases</h3>


<?php 
$contador=sizeof($materia);
// pr($modulos);
// pr($materia);
// pr($dias);

?>

<table>
	<tr>	
	<th>Hr</th>
	<th>Lunes</th>
	<th>Martes</th>
	<th>Miercoles</th>
	<th>Jueves</th>
	<th>Viernes</th>
	</tr>

<?php 


	// echo "<tr>";

for($x=8;$x<20;$x++){
	echo "<tr>";

	
	if($x<=10){

	echo '<td>'.$x.':00  - '.($x+1).':00</td>';
}elseif ($x >= 10){
	echo '<td>'.$x.':20  - '.($x+1).':20</td>';

}
foreach($dias as $k => $dia):

	// echo '<td>'.$dia;
	echo '<td>';
	foreach($modulos as $P =>$modulo):



	for($w=0;$w<=$contador;$w++){
		
		if(isset($modulos[$w][$P]['CourseModule']['day']) && $modulos[$w][$P]['CourseModule']['day'] === $dia ){

		// echo $modulos[$w][$k]['CourseModule']['start_time'].'<td>';
		$hora = $modulos[$w][$P]['CourseModule']['start_time'];
		$materia_id =$modulos[$w][$P]['CourseModule']['course_id'];

			if($hora == $x){

				echo $materia[$materia_id];
				// echo $materia_id;

				// echo $modulos[$w][$P]['CourseModule']['course_id'];
				echo '<br>';
				echo $hora;
				echo '-'.$modulos[$w][$P]['CourseModule']['end_time'];
			}
		}
	}
		endforeach;




	endforeach;
	echo "</tr>";
}
//horario semi terminado 




 ?>


</table>
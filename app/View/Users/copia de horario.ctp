<h3>Horario de clases</h3>


<?php 
// pr($cuatrimestre);
$cuatri=$cuatrimestre[0]['StudentProfile']['semester'];
echo $cuatri;
$contador=sizeof($materia);
// pr($modulos);
$hrsinicio=[];
$hrsfin=[];
// pr($materia);
// pr($dias);
for($w=0;$w<$contador;$w++){
	$lng=sizeof($modulos[$w]);
	// echo $lng;
	for($z=0;$z<$lng;$z++){
		array_push($hrsinicio,$modulos[$w][$z]['CourseModule']['start_time']);
		array_push($hrsfin,$modulos[$w][$z]['CourseModule']['end_time']);


	}
}

// $inicio=min($hrsinicio);
// echo 'Hola minima inicio : '.$inicio;
// echo '<br>';
$fin=max($hrsfin);
echo 'Hola minima fin : '.$fin;


// echo  ' ';
// $horasTotales = date("H:i:s",strtotime("00:00:00") +strtotime($fin)-strtotime($inicio));
// echo '<br>';


// echo 'Horas transcurridas'. $horasTotales;
// $hrshorario=0;

// if($cuatri <=6 ){
// 	$hrshorario
// }elseif($cuatri >= 7 ) {
// 	$hrshorario



// }

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
#funcion mañana;
for($x=8;$x<20;$x++){
	echo "<tr>";

	
	if($x<=10){

	echo '<td>'.$x.':00  - '.($x+1).':00</td>';
}elseif ($x == 11){
	echo '<td>'.$x.':00  - '.($x).':20</td>';

}elseif($x >= 12) {
	echo '<td>'.($x-1).':20 - '.($x).':20</td>';
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
// horario semi terminado 




 ?>


</table>
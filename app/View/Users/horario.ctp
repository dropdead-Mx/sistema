<h3>Horario de clases</h3>


<?php 
// pr($cuatrimestre);
$cuatri=$cuatrimestre[0]['StudentProfile']['semester'];
// echo $cuatri;
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
$fin=max($hrsfin);
$hrfin=date("H",strtotime($fin));
echo '<br>';
$hrinicio=0;
// echo $fin;




// echo  ' ';
// $horasTotales = date("H:i:s",strtotime("00:00:00") +strtotime($fin)-strtotime(08:00));
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

$hora2=0;

if($cuatri <=6 ){
	// $hrsContador=date("H",strtotime("00:00:00") +strtotime($fin)-strtotime('08:00:00'));
	// echo 'Matutino '.$hrsContador;
	$hrsinicio=7;
	// poner funciones aqui
	for ($hrsinicio; $hrsinicio<=$hrfin;$hrsinicio++){
		echo '<tr>';


			if($hrsinicio<=10){

				$hora2=$hrsinicio;

				echo '<td>'.$hrsinicio.':00  - '.($hrsinicio+1).':00</td>';
			}elseif ($hrsinicio == 11){
				echo '<td><p>'.$hrsinicio.':00  - '.($hrsinicio).':20</p><span class="letras"> R </span></td>';
				// echo '';
				$hora2=$hrsinicio;

			}elseif($hrsinicio >= 12) {
				echo '<td>'.($hrsinicio-1).':20 - '.($hrsinicio).':20</td>';
				$hora2=$hrsinicio-1;
				
			}


		foreach($dias as $k => $dia):
			echo '<td>';
		if($hrsinicio == 11 && $dia == 'lunes'){
			// echo '<p> </p>';
			echo "<span class ='letras'> E </span>";
		}elseif ($hrsinicio == 11 && $dia == 'martes') {
			echo "<span class ='letras'> C </span>";
			
		}elseif ($hrsinicio == 11 && $dia == 'miercoles') {
			echo "<span class ='letras'> E </span>";
			
		}elseif ($hrsinicio == 11 && $dia == 'jueves') {
			echo "<span class ='letras'> S </span>";
			
		}elseif ($hrsinicio == 11 && $dia == 'viernes') {
			echo "<span class ='letras'> O </span>";
			
		}


		foreach($modulos as $P => $modulo):
			for($w=0;$w<=$contador;$w++){

			if(isset($modulos[$w][$P]['CourseModule']['day']) && $modulos[$w][$P]['CourseModule']['day'] === $dia ){

		// echo $modulos[$w][$k]['CourseModule']['start_time'].'<td>';
			$hora = $modulos[$w][$P]['CourseModule']['start_time'];
			$materia_id =$modulos[$w][$P]['CourseModule']['course_id'];

				if($hora == $hrsinicio && $hrsinicio <=10 ){

					echo $materia[$materia_id];
					// echo $materia_id;

					// echo $modulos[$w][$P]['CourseModule']['course_id'];
					echo '<br>';
					echo $hora;
					echo '-'.$modulos[$w][$P]['CourseModule']['end_time'];
					echo '</td>';
			} elseif($hora == $hora2 && $hrsinicio >= 11){
					// $hrsinicio=$hrsinicio-1;
					

					echo $materia[$materia_id];
					// echo $materia_id;

					// echo $modulos[$w][$P]['CourseModule']['course_id'];
					echo '<br>';
					echo $hora;
					echo '-'.$modulos[$w][$P]['CourseModule']['end_time'];
					echo '</td>';
			}
		}

			}
			endforeach;
			endforeach;
			echo "</tr>";

	}


}elseif($cuatri >=7){
	// $hrsContador=date("H",strtotime("00:00:00") +strtotime($fin)-strtotime('10:10:00'));
	// echo 'Vespertino '.$hrsContador;
	$hrinicio=10;
	// poner funciones aqui
	

}



 ?>


</table>
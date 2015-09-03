<h3>Mis horarios de clase</h3>



<?php  
if(sizeof($horarios)>=1){ 


foreach($dias as $k => $dia ){
	echo "<section class='horarioDias'>";
	echo "<strong>Seccion dia : ".$dia."</strong>";
	foreach ($horarios as $x => $horario){

	$day=$horario['dia'];

	if ($dia == $day){

		echo "<div class='horarioModulos'>";

		echo "<p>Materia: ".$horario['course_name'].'</p>';
		echo "<p>Grupo: ".$horario['grupo']."</p>";
		echo "<p>Horas de clase: ".$horario['hrs']."</p>";

		echo "</div>";

	}else {

	}

	}




}

echo "</section>";

}else {
	echo "<strong>No se encontraron horas asignadas</strong>";
}





?>


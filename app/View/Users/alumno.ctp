<h2>Bienvenido <?php echo implode($nombre); ?></h2>
<?php 

// pr($cuatrimestre);
// pr($materia);
// pr($goals);
// pr($calif);
// pr($examenes);
echo '<p>'.$this->Html->link('Ver fechas de examen',array('action'=>'examenes',$cuatrimestre[0]['StudentProfile']['user_id'])) .'</p> ';
echo '<p>'.$this->Html->link('Ver Horario',array('action'=>'horario',$cuatrimestre[0]['StudentProfile']['user_id'])) .'</p> ';

?>


<div class="asistencias">
	<p>Buscar asistencias: </p>

	<div><label for="inicio">Fecha inicio : </label> <input type="text" class="datepicker" id="inicio" ></div>
	<div><label for="fin">Fecha final: </label><input type="text" class="datepicker" id="fin"></div>
	<div>
	<p>seleccione una materia : </p>
		<select  id="materia">
		<option value="">--- Materias ---</option>
			<?php  foreach ($materia as $x => $materias ):

				echo '<option value= '.$materias['Course']['id'].'>'.$materias['Course']['name'].'</option>';
			
			endforeach;?>
		</select>
	</div>
	<input type="hidden" data-id="<?php echo $user_id ;?>" id="userid" >
	<button class="buscarAsistencia">Buscar</button>
</div>

<div class="AsistenciasTotales">
	
</div>

<?php foreach ($materia as $k =>$materias): ?>


<div>
	<h3><?php echo $materias['Course']['name']; ?></h3>
	<p>Impartida por : <?php echo $materias['User']['name']; ?></p>
	
	<?php 
	$tamaño=sizeof($goals[$k]);
	if($tamaño > 0){

		for($x=1;$x<=$tamaño;$x++){
			echo '<br><h4>Parcial '.$x.'</h4><br> ';
			// pr( $goals[$k][$x]);
			foreach ($goals[$k][$x] as $z =>$ct):
			// $calificado = sizeof($calif[$z]);
			if( isset($calif[$z])){

			echo '<p> '.$ct.': <strong> '.$calif[$z].'</strong>'.'</p>';
			}else {

			echo '<p>'.$ct.' <strong>N/A</strong>'.'</p>';

			}
			endforeach;
		}

	}else {
		echo "<br>";
		echo "<p>No hay criterios de evaluacion registrados para esta materia<p>";
	}



	// echo sizeof($examenes[$k]);

	// echo '<div class="fechasExamen">';
	// echo '<h4>Fechas de examenes</h4>';
	// foreach($examenes[$k] as $w => $fechas):
	
	// 	if($fechas['Exam']['partial']<=3){

	// 	echo '<p> Fecha de examen Parcial  #'.$fechas['Exam']['partial'].' :'.$fechas['Exam']['fecha'].' <strong>Hora  de inicio: </strong>'.$fechas['Exam']['start_time'].'</p>';
	// 	}else if ($fechas['Exam']['partial'] == 4){
	// 		echo '<p> Fecha de examen Cuatrimestral :'.$fechas['Exam']['fecha'].' <strong>Hora  de inicio: </strong>'.$fechas['Exam']['start_time'].'</p>';
	// 	}else if($fechas['Exam']['partial'] == 5){
	// 		echo '<p> Fecha de examen Extraordinario :'.$fechas['Exam']['fecha'].'</p>';

	// 	}

	// 	endforeach;
	// echo '</div>';

	

	?>




</div>

<?php endforeach;?>

<?php  echo $this->Html->script(array('scripts')); ?>

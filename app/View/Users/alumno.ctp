<h2>Bienvenido <?php echo implode($nombre); ?></h2>
<?php 


echo '<p>'.$this->Html->link('Ver fechas de examen',array('action'=>'examenes')) .'</p> ';
echo '<p>'.$this->Html->link('Ver Horario',array('action'=>'horario')) .'</p> ';
echo '<p>'.$this->Html->link('Cambiar contraseña',array('action'=>'editStudent')) .'</p> ';


?>


<div class="asistencias">
	<p>Buscar asistencias: </p>


	<div>
	<p>seleccione una materia : </p>
		<select  id="materiaAsistencias">
		<option value="">--- Materias ---</option>
			<?php  foreach ($materia as $x => $materias ):

				echo '<option value= '.$materias['Course']['id'].'>'.$materias['Course']['name'].'</option>';
			
			endforeach;?>
		</select>
	</div>
	<input type="hidden" data-id="<?php echo $user_id ;?>" id="userid" >
	<!-- <button class="buscarAsistencia">Buscar</button> -->
</div>

<div class="AsistenciasTotales" >
	
</div>

<?php foreach ($materia as $k =>$materias): ?>


<div>
	<h3><?php echo $materias['Course']['name']; ?></h3>
	
	
	<?php 
	$tamaño=sizeof($goals[$k]);
	if($tamaño > 0){

		for($x=1;$x<=$tamaño;$x++){
			echo '<br><h4>Parcial '.$x.'</h4><br> ';
			
			// pr( $goals[$k][$x]);
			foreach ($goals[$k][$x] as $z =>$ct):
			// $calificado = sizeof($calif[$z]);
			if( isset($calif[$z])){

			
			preg_match("/\d+/", $ct, $obtenido);

			$porcent=(implode($obtenido));
			$total=($calif[$z]*100)/$porcent;



			echo '<p> '.$ct.' => <strong> '.$total.'%</strong>'.'</p>';
			}else {

			echo '<p>'.$ct.' <strong>N/A</strong>'.'</p>';

			}
			endforeach;

			foreach($calificacionesParciales as $q =>$calificacion){
				if($calificacion['PartialScore']['course_id']==$materias['Course']['id'] && $calificacion['PartialScore']['partial']==$x){
					echo '<p class="calificacionFinalParcial">Calificacion final de este parcial: '.$calificacion['PartialScore']['final_score'].'</p>';
				}
			}



		}

	}else {
		echo "<br>";
		echo "<p>No hay criterios de evaluacion registrados para esta materia<p>";
	}



	

	

	?>




</div>

<?php endforeach;?>

<?php  echo $this->Html->script(array('scripts')); ?>

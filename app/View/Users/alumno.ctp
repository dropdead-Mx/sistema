<h3>Bienvenido <?php echo implode($nombre); ?></h3>
<?php 

// pr($cuatrimestre);
// pr($materia);
// pr($goals);
// pr($calif);


foreach ($materia as $k =>$materias): ?>

<div>
	<strong><?php echo $materias['Course']['name']; ?></strong>
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
	?>




</div>

<?php endforeach;?>
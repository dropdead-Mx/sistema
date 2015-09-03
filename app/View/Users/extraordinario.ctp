<h3>Calificar Examen extraordinario de la materia: <?php echo $nombreMateria[0]['Course']['name']; ?></h3>


<table>
	<tr>
		<th>Nombre</th>
		<th>Calificacion</th>
	</tr>



<?php 

	echo $this->Form->create('User');

	foreach ($examenExtra as $k => $extra) {
	echo '<tr>';
	echo '<td>'.$extra['PartialScore']['nombre'].'</td>';
	echo '<td>';

	echo $this->Form->input('PartialScore.'.$k.'.id',array('text'=>'text','value'=>$extra['PartialScore']['id']));
	echo $this->Form->input('PartialScore.'.$k.'.final_score',array('placeholder'=>'calificacion anterior: '.$extra['PartialScore']['final_score'],'label'=>false,'type'=>'text'));
	echo $this->Form->input('PartialScore.'.$k.'.note',array('value'=>$extra['PartialScore']['note'],'hidden'=>true,'label'=>false));
	}



?>

</table>


	<?php echo $this->Form->end('Calificar extraordinario');?>

<?php 
	$contador=sizeof($carreras);
	if(isset($carreras)){
	$output=[];
	for($x=0;$x<$contador;$x++){
		array_push($output,$carreras[$x][0]);
	}
		echo json_encode($output);
	}

?>
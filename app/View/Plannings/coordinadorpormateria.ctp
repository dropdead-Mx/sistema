<?php 
$respuesta=[];
// pr($curso);
if(isset($coordinador)){
	array_push($respuesta,$coordinador[0]);
	array_push($respuesta,$curso[0]);
	echo json_encode($respuesta);


}else {
	echo json_encode($respuesta);
	
}
?>
<?php 


// echo json_encode($fechas); 
if(isset($misAsistencias)){
 echo json_encode($misAsistencias);
}else {
	json_encode('[]');
}



?>
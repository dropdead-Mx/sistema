<?php 
if(isset($examenes)){
	echo json_encode($examenes);

}else {
	echo "not found";
}

?>
<?php 

if(isset($grupos)){
	echo json_encode($grupos);
}else {
	echo 'not found';
}

?>
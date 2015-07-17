<?php 

class Message extends AppModel {


	public $validate=array(
		'subject'=>array(
			'rule'=>'/^[A-Za-z\s+]{10,}$/i',
			'message'=>'Solo se permiten letras en este campo'),
		'mensaje'=>array(
			'rule'=>'/^[A-Za-z\s+]{10,}$/i',
			'message'=>'solo se permiten letras en este campo',
			'required'=>true));
}

?>
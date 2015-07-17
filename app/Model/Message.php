<?php 

class Message extends AppModel {


	public $validate=array(
		'subject'=>array(
			'rule'=>'/^[A-Za-z0-9\¿\?\s+]{2,}$/i',
			'message'=>'Solo se permiten letras en este campo',
			'required'=>true),
		'mensaje'=>array(
			'rule'=>'/^[A-Za-z0-9\s\?\¿+]{9,}$/i',
			'message'=>'solo se permiten letras en este campo',
			'required'=>true));
}

?>
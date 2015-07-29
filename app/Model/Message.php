<?php 

class Message extends AppModel {


	public $validate=array(
		'subject'=>array(
			'rule'=>'/^[A-Za-zÁ-Ÿá-ÿ0-9\¿\?\:\s+]{2,}$/i',
			'message'=>'Solo se permiten letras en este campo',
			'required'=>true),
		'mensaje'=>array(
			'rule'=>'/^[A-Za-zÁ-Ÿá-ÿ0-9\s\?\¿+]{1,}$/i',
			'message'=>'solo se permiten letras en este campo',
			'required'=>true),
		'remitente'=>array(
			'rule'=>'/^[A-Za-zÁ-Ÿá-ÿ0-9\s\?\¿+]{1,}$/i',
			'required'=>true),
		'destinatario'=>array(
			'rule'=>'/^[A-Za-zÁ-Ÿá-ÿ0-9\s\?\¿+]{1,}$/i',
			'required'=>true));
}

?>


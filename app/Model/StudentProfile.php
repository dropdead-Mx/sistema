<?php 

class StudentProfile extends AppModel {

	public $belongsTo=array(
		'User'=>array(
			'className'=>'User',
			'conditions'=>array('User.group_id'=>'8')),
		'Career'=>array(
			'className'=>'Career'),
		'Grupo'=>array(
			'className'=>'Grupo')
		);

	public $validate= array(

		'matricula'=>array(
			'alphanumeric'=>array(
				'rule'=>'alphanumeric',
				'required'=>true),
			'between'=>array(
				'rule'=>array('lengthBetween',10,10),
				'message'=>'La matricula debe de tener 10 caracteres')
			)

		);

}

?>



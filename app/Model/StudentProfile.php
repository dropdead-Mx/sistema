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

	
}

?>
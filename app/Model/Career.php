<?php 

class Career extends AppModel {

	public $validate = array(


		'name'=> array(

			'rule'=> 'notEmpty',

			)

		);
// public $belongsTo='Usrcareer';

	public $displayField='abrev';
	// public $hasMany = 'Course';

	public $hasMany= array (

		'StudentProfile'=>array(
			'className'=>'StudentProfile'),

		'Grupo'=> array(

			'className'=>'Grupo'),
		'Course'=> array('className'=>'Course'),
		'CourseModule'=>array('className'=>'CourseModule'),
		// 'Usrcareer'=>array('className'=>'Usrcareer')


		);





}
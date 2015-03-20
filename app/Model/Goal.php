<?php


class Goal extends AppModel {

	public $displayField='description';

	// public $belongsTo=array(
	// 	'Course'=>array(
	// 		'className'=>'Course'),
	// 	'Grupo'=>array('className'=>'Grupo'),
	// 	'User'=>array('className'=>'User',
	// 		'conditions'=>array('User.group_id'=>'7')));

	public $hasOne =array(
		'Course'=>array(
			'className'=>'Course'),
		'Grupo'=>array(
			'className'=>'Grupo'),
		'User'=>array(
			'className'=>'User',
			'conditions'=>array('User.group_id'=>'7')));




}


 ?>
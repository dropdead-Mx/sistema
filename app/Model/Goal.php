<?php


class Goal extends AppModel {

	public $virtualFields=array(
		'description'=>'CONCAT(Goal.description," ",Goal.percentage," %")');

	public $displayField='description';

	// public $belongsTo=array(
	// 	'Course'=>array(
	// 		'className'=>'Course'),
	// 	'Grupo'=>array('className'=>'Grupo'),
	// 	'User'=>array('className'=>'User',
	// 		'conditions'=>array('User.group_id'=>'7')));
	public $belongsTo='Course';
	// public $hasOne =array(
	// 	// 'Course'=>array(
	// 	// 	'className'=>'Course'),
	// 	'Grupo'=>array(
	// 		'className'=>'Grupo'),
	// 	'User'=>array(
	// 		'className'=>'User',
	// 		'conditions'=>array('User.group_id'=>'7')));



}



 ?>
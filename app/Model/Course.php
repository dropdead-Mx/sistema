<?php

class Course extends AppModel {

	// public $belongsTo='Career';
	public $belongsTo = array(
		'Career'=>array(
			'className'=>'Career')
			
			,
		'User'=>array(
			'className'=>'User',
			
			'conditions'=>array('User.group_id'=>'7')),
		// 'Goal'=>array(
		// 	'className'=>'Goal')
			);
	
	public $hasMany= array(
		'Goal'=>array(
			'className'=>'Goal'),
		'CourseModule'=>array(
			'className'=>'CourseModule')
		);
}
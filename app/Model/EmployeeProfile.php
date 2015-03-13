<?php


class EmployeeProfile extends AppModel {

	public $belongsTo=array(
		'User'=>array(
			'className'=>'User',
			'conditions'=>array('User.group_id'=>'7')));
}




 ?>

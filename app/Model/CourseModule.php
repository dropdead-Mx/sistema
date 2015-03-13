<?php 

class CourseModule extends AppModel {

	public $belongsTo=array(
		'Course'=>array('className'=>'Course'),
		'Career'=>array('className'=>'Career'));
}

?>
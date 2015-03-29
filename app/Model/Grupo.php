<?php 

class Grupo extends AppModel {

	public $virtualFields= array(
		'name'=> 'CONCAT(Grupo.period," ",Grupo.name)');
	public $displayField='name';

	public $belongsTo=array(
		'Career'=>array(
			'className'=>'Career')
		// 'Goal'=>array(
		// 	'className'=>'Goal')
		);
	// public $hasMany='';

// 	public $belongsTo= array(
// 		'Career'=>array('
// 			className'=>'Career'),
// 		'StudentProfile'=>array(
// 			'className'=>'StudentProfile'));
}
?>
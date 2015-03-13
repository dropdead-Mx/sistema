<?php 

class Grupo extends AppModel {

	public $virtualFields= array(
		'name'=> 'CONCAT(Grupo.period," ",Grupo.name)');
	public $displayField='name';

	public $belongsTo='Career';
	// public $hasMany='StudentProfile';

// 	public $belongsTo= array(
// 		'Career'=>array('
// 			className'=>'Career'),
// 		'StudentProfile'=>array(
// 			'className'=>'StudentProfile'));
}
?>
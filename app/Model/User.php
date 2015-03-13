<?php 


class User extends AppModel {

public $belongsTo=array(
	'Group'=>array(
		'className'=>'Group')
	
	);
public $hasOne= array(
	'StudentProfile'=>array(
		'className'=>'StudentProfile',
		'dependent'=> true),
	'EmployeeProfile'=>array(
		'className'=>'EmployeeProfile',
		'dependent'=>true)


	);

public $hasMany=array(
	'Goal'=>array(
		'className'=>'Goal')
	);


	public $virtualFields=array(
		'name'=>'CONCAT(User.name," ",User.apat," ",User.amat)');


	public $displayField='name';





}




?>
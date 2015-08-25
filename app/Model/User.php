<?php 

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

public $belongsTo=array(
	'Group'=>array(
		'className'=>'Group'),

	
	);
public $hasOne= array(
	'StudentProfile'=>array(
		'className'=>'StudentProfile',
		'dependent'=> true),
	'EmployeeProfile'=>array(
		'className'=>'EmployeeProfile',
		'dependent'=>true),
	'Obtainedgoal'=>array(
		'className'=>'Obtainedgoal',
		'dependent'=>true)


	);

public $hasMany=array(
	// 'Course'=>array(
	// 	'className'=>'Course'),
	'Assist'=>array(
		'className'=>'Assist'),
	'Planning'=>array(
		'className'=>'Planning'),
	'Uploadtest'=>array(
		'className'=>'Uploadtest')
	);


	public $virtualFields=array(
		'name'=>'CONCAT(User.name," ",User.apat," ",User.amat)');


	public $displayField='name';



public $validate= array(

		'name'=>array(
			// 'rule'=>'/^[a-zA-Z\s+]{3,}$/i',
			'rule'=>'/^[A-Za-zÁ-Ÿá-ÿ0-9\¿\?\:\s+]{2,}$/i',
			'message'=>'Solo se permiten letras en este campo',
			'required'=>true),
		'apat'=>array(
			// 'rule'=>'/^[a-zA-Z]{3,}$/i',
			'rule'=>'/^[A-Za-zÁ-Ÿá-ÿ0-9\¿\?\:\s+]{2,}$/i',
			'message'=>'Solo se permiten letras en este campo',
			'required'=>true),
		'amat'=>array(
			// 'rule'=>'/^[a-zA-Z]{3,}$/i',
			'rule'=>'/^[A-Za-zÁ-Ÿá-ÿ0-9\¿\?\:\s+]{2,}$/i',
			'message'=>'Solo se permiten letras en este campo',
			'required'=>true),
		'email'=>array(
			'rule'=>array('email'),
			'message'=>'Inserta un email valido',
			'required'=>true),
		'password'=>array(
			'rule'=>array('lengthBetween',5,20),
			'message'=>'La contraseña debe estar entre 5 y 20 caracteres',
			'required'=>true)

	);



public function beforeSave($options = array()) {
    if (isset($this->data['User']['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data['User']['password'] = $passwordHasher->hash(
            $this->data['User']['password']
        );
    }
        
    return true;
}


}




?>
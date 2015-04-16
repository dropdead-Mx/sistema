<?php 

	class Usrcareer extends AppModel {

		public $hasMany=array(
			'User'=>array(
				'className'=>'User',
				'conditions'=>array('User.group_id'=>'6')));
		// public $belongsTo='Career';

	}

?>
<?php 

class Assist extends AppModel {
	public $belongsTo=array('User'=>array('
		className'=>'User',
		'conditions'=>array('User.group_id'=>8)));
}

?>
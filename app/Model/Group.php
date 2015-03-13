<?php 

class Group extends AppModel {
	public $hasMany='User';
	public $displayFields='name';
}
?>
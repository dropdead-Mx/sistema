<?php


class EmployeeProfile extends AppModel {

	public $belongsTo=array(
		'User'=>array(
			'className'=>'User',
			'conditions'=>array('User.group_id'=>'7')));



	public $actsAs= array(

		'Upload.Upload'=>array(

			'foto'=>array(
				'fields'=>array(
					'dir'=>'foto_dir'

					),
					'thumbnailMethod'=>'php',
					'thumbnailSizes'=>array(

						'vga'=>'640x480',
						'thumb'=>'200x200'
						),
					'deleteOnUpdate'=>true,
					'deleteFolderOnDelete'=>true
				)
			)

		);



	public $validate=array(

		'foto'=>array(
			'UploadError'=>array(
				'rule'=>'uploadError',
				'message'=>'Algo anda mal intente de nuevo',
				'on'=>'create'),
			'isUnderPhpSizeLimit'=>array(
				'rule'=>'isUnderPhpSizeLimit',
				'message'=>'El archivo exede el tamaño en mb permitidos'),
			'isValidMimeType'=>array(
				'rule'=>array('isValidMimeType',array('image/jpeg','image/png'),false),
				'message'=>'La imagen no es jpg ni png'
				),
			'isBelowMaxSize'=>array(
				'rule'=>array('isBelowMaxSize',2621440),
				'message'=>'La imagen es demaciado pesada'),
			'isValidExtension'=>array(
				'rule'=>array('isValidExtension',array('jpeg','jpg','png'),false),
				'message'=>'La extencion de la imagen no es valida'),
			'checkUniqueName'=>array(
				'rule'=>array('checkUniqueName'),
				'message'=>'Esta imagen ya existe seleccione otra',
				'on'=>'update')

			),
		'lv_education'=>array(
			'rule'=>array('lengthBetween',1,20),
			'required'=>true,
			'message'=>'Este campo es obligatorio')
		);

function checkUniqueName($data){

	$isUnique=$this->find('first',array('fields'=>array('EmployeeProfile.foto'),'conditions'=>array('EmployeeProfile.foto'=>$data['foto'])));
	if(!empty($isUnique)){
		return false;

	}else {
		return true;
	}
}




}




 ?>

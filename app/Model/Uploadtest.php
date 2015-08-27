<?php 

class Uploadtest extends AppModel {

	public $actsAs=array(
		'Upload.Upload'=>array(
			'examen'=>array(
				'fields'=>array(
					'dir'=>'examen_dir'
					),
				'deleteOnUpdate'=>true,
				'deleteFolderOnDelete'=>true

				)
			));

	public $belongsTo=array(
	'User'=>array(
		'className'=>'User',
		'conditions'=>array('User.group_id'=>'7'))
	);

	public $validate=array(

		'examen'=>array(
			'UploadError'=>array(
				'rule'=>'uploadError',
				'message'=>'Algo anda mal intente de nuevo',
				'on'=>'create'),
			'isUnderPhpSizeLimit'=>array(
				'rule'=>'isUnderPhpSizeLimit',
				'message'=>'El archivo exede el tamaño en mb permitidos'),
			'isValidMimeType'=>array(
				'rule'=>array('isValidMimeType',array('application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/msword','application/pdf'),false),
				'message'=>'no es un archivo  de tipo documento'
				),
			'isBelowMaxSize'=>array(
				'rule'=>array('isBelowMaxSize',2621440),
				'message'=>'El archivo sobrepasa los 2.5mb'),
			'isValidExtension'=>array(
				'rule'=>array('isValidExtension',array('docx','doc','pdf'),false),
				'message'=>'La extencion del archivo no es valida'),
			'checkUniqueName'=>array(
				'rule'=>array('checkUniqueName'),
				'message'=>'Esta archivo ya existe seleccione otro',
				'on'=>'update')

			),
		'coordi_id'=>array(
			'rule'=>'numeric',
			'required'=>true,
			'message'=>'campo requerido'),

		'user_id'=>array(
			'rule'=>'numeric',
			'required'=>true,
			'message'=>'campo requerido'),

		'course_id'=>array(
			'rule'=>'numeric',
			'required'=>true,
			'message'=>'campo requerido'),
		'partial'=>array(
			'rule'=>'/^[1-9]{1,}$/i',
			'required'=>true,
			'message'=>'seleccione un periodo valido')
);

	function checkUniqueName($data){

	$isUnique=$this->find('first',array('fields'=>array('Uploadtest.examen'),'conditions'=>array('Uploadtest.examen'=>$data['examen'])));
	if(!empty($isUnique)){
		return false;

	}else {
		return true;
	}
}




}

?>
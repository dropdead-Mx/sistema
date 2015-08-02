<?php 

class Planning extends AppModel {


	public $actsAs=array(
		'Upload.Upload'=>array(
			'planeacion'=>array(
				'fields'=>array(
					'dir'=>'planeacion_dir'
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

		'planeacion'=>array(
			'UploadError'=>array(
				'rule'=>'uploadError',
				'message'=>'Algo anda mal intente de nuevo',
				'on'=>'create'),
			'isUnderPhpSizeLimit'=>array(
				'rule'=>'isUnderPhpSizeLimit',
				'message'=>'El archivo exede el tamaño en mb permitidos'),
			'isValidMimeType'=>array(
				'rule'=>array('isValidMimeType',array('application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/msword','application/x-zip-compressed','application/zip','application/x-rar-compressed','application/rar-compressed','application/x-rar'),false),
				'message'=>'no es un archivo comprimido ni de tipo documento'
				),
			'isBelowMaxSize'=>array(
				'rule'=>array('isBelowMaxSize',5242880),
				'message'=>'El archivo sobrepasa los 5mb'),
			'isValidExtension'=>array(
				'rule'=>array('isValidExtension',array('zip','rar','docx','doc'),false),
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
		'description'=>array(
			'rule'=>'/^[a-zA-Z\s+0-9\:\.\?]{3,}$/i',
			'required'=>true,
			'message'=>'solo se permiten letras numeros y algunos signos ')
		);
}


?>
<div class="form">

<p>Agregar Estudiante</p>
<fieldset>
	<!-- <legend>Agregar Estudiante</legend> -->


	<?php 
		echo $this->Form->create('User',array('id'=>'formulario'));
		echo $this->Form->input ('name',array('label'=>'Nombre','id'=>'nombre'));
		echo $this->Form->input ('apat',array('label'=>'Apellido Paterno','id'=>'apater'));
		echo $this->Form->input ('amat',array('label'=>'Apellido Materno','id'=>'amater'));

		echo $this->Form->input ('email',array('label'=>'Correo Electronico'));
		echo $this->Form->input ('password',array('label'=>'Contraseña','id'=>'contra'));
		echo $this->Form->input('StudentProfile.career_id',array('label'=>'Carrera',
			'id'=>'career_id',
			'empty'=>'selecciona una carrera'));
		echo $this->Form->input('StudentProfile.grupo_id',array('label'=>'Grupo',
			'id'=>'grupo_id',
			'empty'=>'selecciona un grupo'));
		echo $this->Form->input ('StudentProfile.matricula',array('label'=>'Matricula','placeholder'=>'Formato de la matricula isc2014001'));
		// echo $this->Form->hidden ('StudentProfile.semester',array('label'=>'cuatrimestre'));

		echo $this->Form->hidden ('group_id',array('value'=> '8'));
		echo $this->Form->end('Registrar Estudiante');

?>

</fieldset>

</div>

<script>
(function ($){

function getSemester() {
	$('#grupo_id').on('click',function(){
		var semestre = $('#grupo_id option:selected').text().substr(0,1);
		var existe =$('input#StudentProfileSemester').length;
		var inputS='<input type="hidden" name="data[StudentProfile][semester]" label="cuatrimestre" id="StudentProfileSemester" value="'+semestre+'"  >';
		if (existe > 0 ){
			$('input#StudentProfileSemester').remove();
			$('form#formulario').append(inputS);


		}else {
			$('form#formulario').append(inputS);
		}

		
	});
}

	$(document).on('ready', function(){
		getSemester();

		$('#career_id').on('change', function(){
			$.ajax({
			  type: "GET",
			  url: "<?php echo Router::url('/', true)?>" + "careers/getGroupsByCareerId/"  + $(this).val(),
			  success : function(response){
			  	// Aqui construyes tu select
			  	console.info(response.length );
			  	if(typeof response !==  'undefined' && response.length > 0) {
			  		var items = [];
			  		for(var i=0, numOptions = response.length; i<numOptions;  i++){
						items.push('<option value="'+response[i].Grupo.id+'">'+response[i].Grupo.name+'</option>');
			  		}
			  		$('#grupo_id').html(items.join(''));
			  	} else {
			  		$('#grupo_id').html('');
			  	}
			  	console.log(response);
			  }
			});

		});
		
	});
})(jQuery);
</script>
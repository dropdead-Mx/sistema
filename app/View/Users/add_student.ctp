<div class="form">

<p>Agregar Estudiante</p>
<fieldset>
	<!-- <legend>Agregar Estudiante</legend> -->


	<?php 
		echo $this->Form->create('User');
		echo $this->Form->input ('name',array('label'=>'Nombre'));
		echo $this->Form->input ('apat',array('label'=>'Apellido Paterno'));
		echo $this->Form->input ('amat',array('label'=>'Apellido Materno'));

		echo $this->Form->input ('email',array('label'=>'Correo Electronico'));
		echo $this->Form->input ('password',array('label'=>'Contraseña'));
		echo $this->Form->input('StudentProfile.career_id',array('label'=>'Carrera',
			'id'=>'career_id',
			'empty'=>'selecciona una carrera'));
		echo $this->Form->input('StudentProfile.grupo_id',array('label'=>'Grupo',
			'id'=>'grupo_id',
			'empty'=>'selecciona un grupo'));
		echo $this->Form->input ('StudentProfile.matricula',array('label'=>'Matricula'));
		echo $this->Form->input ('StudentProfile.semester',array('label'=>'cuatrimestre'));

		echo $this->Form->hidden ('group_id',array('value'=> '8'));
		echo $this->Form->end('Registrar Estudiante');

?>

</fieldset>

</div>

<script>
(function ($){
	$(document).on('ready', function(){
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
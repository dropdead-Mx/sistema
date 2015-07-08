 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy-mm-dd',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);


	var valores=[];
	var porcentajeFinal=0;
	function modificaIDSC() {

			$("#myTbody > tr.campoModulo").each(
				function(i){

				var matName='data[CourseModule]['+((i+1)-1)+']';
				var matId='CourseModule'+((i+1)-1)+'';

				console.log(matName);

				$('#myTbody tr.campoModulo:last td div.input.select').children('select').eq(0).attr({id :''+matId+'CourseId'});
				$('#myTbody  tr.campoModulo:last  td div.input.select').children('select').eq(0).attr({name :''+matName+'[course_id]'});
				$('#myTbody  tr.campoModulo:last  td div.input.select').children('select').eq(1).attr({name :''+matName+'[career_id]'});
				$('#myTbody tr.campoModulo:last td div.input.select').children('select').eq(1).attr({id :''+matId+'CareerId'});
				$('#myTbody  tr.campoModulo:last  td div.input.select').children('select').eq(2).attr({name :''+matName+'[day]'});
				$('#myTbody tr.campoModulo:last td div.input.select').children('select').eq(2).attr({id :''+matId+'Day'});

				$('#myTbody  tr.campoModulo:last  td div.input.time').children('select').eq(0).attr({name :''+matName+'[start_time][hour]'});
				$('#myTbody tr.campoModulo:last td div.input.time').children('select').eq(0).attr({id :''+matId+'StartTimeHour'});

				$('#myTbody  tr.campoModulo:last  td div.input.time').children('select').eq(1).attr({name :''+matName+'[start_time][min]'});
				$('#myTbody tr.campoModulo:last td div.input.time').children('select').eq(1).attr({id :''+matId+'StartTimeMin'});

				$('#myTbody  tr.campoModulo:last  td div.input.time').children('select').eq(2).attr({name :''+matName+'[start_time][meridian]'});
				$('#myTbody tr.campoModulo:last td div.input.time').children('select').eq(2).attr({id :''+matId+'StartTimeMeridian'});

				$('#myTbody  tr.campoModulo:last  td.tFin div.input.time').children('select').eq(0).attr({name :''+matName+'[end_time][hour]'});
				$('#myTbody tr.campoModulo:last td.tFin div.input.time').children('select').eq(0).attr({id :''+matId+'EndTimeHour'});

				$('#myTbody  tr.campoModulo:last  td.tFin div.input.time').children('select').eq(1).attr({name :''+matName+'[end_time][min]'});
				$('#myTbody tr.campoModulo:last td.tFin div.input.time').children('select').eq(1).attr({id :''+matId+'EndTimeMin'});

				$('#myTbody  tr.campoModulo:last  td.tFin div.input.time').children('select').eq(2).attr({name :''+matName+'[end_time][meridian]'});
				$('#myTbody tr.campoModulo:last td.tFin div.input.time').children('select').eq(2).attr({id :''+matId+'EndTimeMeridian'});



			
				i++;
				});

			}

	function elimina(){
		$("#myTbody > tr>td >input.elimina").click(function(){
			var numR=$("#myTbody>tr").length;
			if( numR > 2){
			$(this).parent('td').parent('tr').remove();
			}else {
				console.log('no se puede eliminar');
			}
			
		});
		
	}

	function clona() {
		$("p.agrega").click(function(){
			
			var x=$('#myTbody >tr:last').clone(true);
			//verificar data name e ir sumando 1o
			$("#myTbody").append(x);
			modificaIDSC();

		});
	}

// function materiasXCarrera(){
// 			$('#career_id').on('change', function(){
// 			$.ajax({
// 			  type: "GET",
// 			  url: "../careers/getCoursesByCareerId/"  + $(this).val(),
// 			  success : function(response){
// 			  	// Aqui construyes tu select
// 			  	console.info(response.length );
// 			  	if(typeof response !==  'undefined' && response.length > 0) {
// 			  		var items = [];
// 			  		for(var i=0, numOptions = response.length; i<numOptions;  i++){
// 						items.push('<option value="'+response[i].Course.id+'">'+response[i].Course.name+'</option>');
// 			  		}
// 			  		$('#course_id').html(items.join(''));
// 			  	} else {
// 			  		$('#course_id').html('');
// 			  	}
// 			  	console.log(response);
// 			  }
// 			});

// 		});
		

// }

function gruposXcarrera() {
		var ubicacion = location.pathname;
		var link=" ";
		if(ubicacion == '/sistema/users/'){
			link='../careers/getGroupsByCareerId/';
		}else{
			link='../careers/getGroupsByCareerId/'
		}

		$('#career_id').on('change', function(){
			$.ajax({
			  type: "GET",
			  url: link + $(this).val(),
			  success : function(response){
			  	// Aqui construyes tu select jajajaj
			  	console.info(response.length );
			  	if(typeof response !==  'undefined' && response.length > 0) {
			  		var items = [];
			  		items.push('<option value="">Grupos disponibles </option>');
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
}

function getSemester() {
	$('#grupo_id').on('change',function(){
		var semestre = $('#grupo_id option:selected').text().substr(0,1);
		console.log('elsemestre es'+semestre);
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

function materiasXmaestro(){
			$('.user_id').on('change', function(){
			$.ajax({
			  type: "GET",
			  url: '../courses/getCoursesByUserId/' + $(this).val(),
			  success : function(response){

			  	console.info(response.length );
			  	if(typeof response !==  'undefined' && response.length > 0) {
			  		var items = [];
			  		for(var i=0, numOptions = response.length; i<numOptions;  i++){
						items.push('<option value="'+response[i].Course.id+'">'+response[i].Course.name+'</option>');
			  		}
			  		$('.course_id').html(items.join(''));
			  	} else {
			  		$('.course_id').html('');
			  	}
			  	console.log(response);
			  }
			});

		});
}
//agregar fucion onclic y detro poner each para hacer la suma
// function sumaPorcentaje(){

// $('input.num:last').on('click',function(){
// 	var total=$("#criterios #tb tr.contenido").length;
//  console.log(total);

// 		w=0;
// 	for(x=1; x <= total ; x++){

// 		var z =parseFloat($("div.input.number").children('input.num').eq(x).val());
// 		console.log(z);
// 		// if($.type(z) === 'undefined'){

// 		// 	console.log('no tiene numero');
// 		// }else {
// 		// 	w=w+parseFloat(z);
// 		// 	console.log(w);
// 		// }
// 	}

//  });


// }

function incGoal() {
	var z=1;

	$('button#aumenta').on('click',function() {

		var totalF=$("#criterios #tb tr.contenido").length;
		if(totalF >=5){
			alert('no se permite agregar mas campos');
		}else {

		var inputsH=$('#GoalForm input[type="hidden"].escondido1:last,#GoalForm input[type="hidden"].escondido2:last,#GoalForm input[type="hidden"].escondido3:last').clone(true);
		// alert(inputsH);
		inputsH.each(function(){
			$(this).attr("name",$(this).attr("name").replace(/(\d+)/,''+z));
	    	$(this).attr("id",$(this).attr("id").replace(/(\d+)/,''+z));
		});

		$('#GoalForm div.inputsEscondidos').append(inputsH);

		var fila=$("#criterios #tb tr.contenido:last").clone(true);
		fila.find('input.required:text').val('');
		fila.find('input[type="number"]').val('');

		$("#criterios #tb").append(fila);
		
		
		$("#criterios #tb tr.contenido:last").find('select').each(function(){
	    	$(this).attr("name",$(this).attr("name").replace(/(\d+)/,''+z));
	    	$(this).attr("id",$(this).attr("id").replace(/(\d+)/,''+z));
	 });

	   $("#criterios #tb tr.contenido:last div.input").children('input').each(function(){

	    	$(this).attr("name",$(this).attr("name").replace(/(\d+)/,''+z));
	    	$(this).attr("id",$(this).attr("id").replace(/(\d+)/,''+z));

	    });
		z++;
	}
});


	 	$('#tb tr.contenido input.elimina').on('click',function(){
	 var totalF=$("#criterios #tb tr.contenido").length;
	 	console.log(totalF);
	 	if(totalF <=1){
			console.log('no se puede eliminar');
		}else if(totalF >= 2){
			// $(this).parent('td').parent('tr').remove();
			$('tr.contenido:last').remove();

		}
	 	});

}
function checkPorcentaje(){
		valores.length=0;
		porcentajeFinal=0;
		$('input.required.number').each(function(){
		var tp = parseFloat($(this).val());
		valores.push(tp);	
	});
	for(x=0; x <= valores.length-1; x++ ){
		porcentajeFinal=porcentajeFinal+valores[x];

	}
	return porcentajeFinal;
}

// function changecounter(){
// 	$('button.xdd').on('click',function(){
		


// 	});

	

// }


function toUppercase() {

	$('form.addForm input[type="text"],form.editForm input[type="text"]').keyup(function(){
		$(this).val($(this).val().toUpperCase());
	});


	$('form.addForm input[type="text"],form.editForm input[type="text"]').focusout(function(){
		$(this).val($(this).val().toUpperCase());


	});
		$('form.addForm input[type="text"],form.editForm input[type="text"]').focus(function(){
		$(this).val($(this).val().toUpperCase());


	});



}

function calificParcial(){
	i=0;
		// $('button.xd3').on('click',function(){
	$('#calificacionesPar').on('submit',function() {
	i=0;

	$('#calificacionesPar  input.calf[type="number"]').each(function(){
		$(this).css('background','#fff');


		actual=parseFloat($(this).val());
		maximo=parseFloat($(this).parent('td.porcentaje').attr('data-porcentaje'));

		if(actual > maximo ){
		$(this).css('background','red');
		return i+=1;

		}
		else if (actual <= maximo) {
		// $(this).css('border','2px solid green');x
		}

	});

	if(i > 0){
		alert('Corrige los campos marcados en rojo, no deben ser mayores al porcentaje asignado');
		return false;
	}else {
		return true;
	}

// alert(i);
		});

}

function misAsistencias(){



	$('button.buscarAsistencia').on('click', function() {
		asistencia=0;
		retardos=0;
		faltas=0;
		var asistencias=[];
		$('p.asist,strong.noAssist').remove();
		fecha1=$('input#inicio').val();
		fecha2=$('input#fin').val();
		usuario=$('input#userid').attr('data-id');
		materia=$('select#materia').val();
		console.log(materia);

		// if(fecha1 > fecha2){
		// 	alert('la fecha 1 es mayor');
		// }else if(fecha2 > fecha1){
		// 	alert('la fecha 2 es mayor');
		// }

		if(fecha1 < fecha2 && materia != ''){
			// inicio ajax
			$.ajax({
			type:"GET",
			url:'../getassists/'+fecha1+'/'+fecha2+'/'+usuario+'/'+materia,
			success: function(response){
				// console.info(response.length);
				// console.log(response);
				if(typeof response !== 'undefined' && response.length >0 ){
					for (var i=0, num=response.length; i< num; i++){


						asistencias.push('<p class="asist">  Fecha:  '+response[i].Assist.date_assist+', Status : '+response[i].Assist.status+' Nota : '+response[i].Assist.note+'</p>');
						var estatus=response[i].Assist.status;

						if (estatus == 1 ){
							asistencia=asistencia+1;
						}
						else if( estatus ==2 ){
							retardos=retardos+1;
						}else if( estatus == 3 ){
							faltas=faltas+1;
						}

					}
					$('.AsistenciasTotales').append(asistencias);
					$('.AsistenciasTotales').append('<p class="asist"> Asistencias: '+asistencia+' Retardos: '+retardos+'  Faltas: '+faltas+'</p>');


				}else {
					$('.AsistenciasTotales').html('<strong class="noAssist">No se encontraron asistencias en ese rango de fechas</strong>');
				}

			}
		});

 	// fin ajax

		}else if(fecha2 < fecha1 && materia != ''){
			alert('La fecha final debe ser mayor a la inicial');
			$('input#inicio').val(' ');
			$('input#fin').val(' ');

			


		}else if(fecha1 == fecha2 && materia !=''){
			alert('Escoje un rango mayor de fechas');
			$('input#inicio').val(' ');
			$('input#fin').val(' ');
		}


		

		

	});

}

function delimitaHrs(){
	filtro=$('select.inputHoras').filter(function(){
	return(this.id.match(/\d+StartTimeHour|EndTimeHour/));

	});

	filtroMinutos=$('select.inputHoras').filter(function(){
	return(this.id.match(/\d+StartTimeMin|EndTimeMin/));

	});
	// filtro.css('background','blue')
	$(filtro).children('option').each(function(){
		if($(this).text() <= 6 ) {
			$(this).remove();
		} else if($(this).text() > 18){
			$(this).remove();


		}
		
	});

	filtroMinutos.children('option').each(function(){


		enteros = $(this).text().match(/\d0/);
		console.log(enteros);
		if(enteros == null && $(this).text() != '--'){
			
			$(this).remove();
		}
		


	});

}

function matxCuatyCarr(){

	$('select#cuatrimestre,select#infocalif').on('change',function(){
	$('select#materiasporcarrera').children('option.opcion').remove();

	carrera = $('select#infocalif').val();
	cuatri= $('select#cuatrimestre option:selected').val();
	materias=[];

	if(carrera != 0 && cuatri != 0){
		// alert('ok');
		// console.log(cuatri);

		$.ajax({
			type:'GET',
			url:'../materiasporgerarquia/'+carrera+'/'+cuatri,
			success:function(response){
			

				console.info(response);

				if(typeof response !== 'undefined' && response.length >0 ){

				$('select#materiasporcarrera option[class="noMaterias"]').text('--Materias Disponibles--');

					for (var i=0, num=response.length; i< num; i++){

						materias.push('<option value="'+response[i].Course.id+'"class="opcion">'+response[i].Course.name+'</option>');




				// alert('No se encontraron materias para esta carrera y semestre');


				}
					$('#materiasporcarrera').append(materias);


			}else {
				// alert('No se encontraron materias para esta carrera y semestre');
				$('select#materiasporcarrera option[class="noMaterias"]').text('--Sin materias--');

			}
		}

		});



	}else if( (carrera == 0 && cuatri >0 ) || (cuatri == 0 && carrera > 0) ){
		// alert('Porfavor selecciona una carrera y cuatrimestre para realizar la busqueda');
		$('select#materiasporcarrera option[class="noMaterias"]').text('--Sin materias--');

	}

		
	});


 //aqui funcion ajax para dibujar la tabla con los alumnos y sus calificaciones
 $('button#buscarCalificaciones').on('click',function(){
				// setTimeout(10000);



 	


 	carrera = $('select#infocalif').val();
	cuatri= $('select#cuatrimestre option:selected').val();
	materia=$('select#materiasporcarrera').val();
	parcial=$('select#parciales').val();
	calificaciones=[];
	


	if( carrera != 0 && cuatri != 0 && materia != 0 && parcial != 0 ){




		$.ajax({
			type:'GET',
			url:'../consultarcalificaciones/'+carrera+'/'+cuatri+'/'+materia+'/'+parcial,
			success:function(response){
				// $('p.alumno').fadeOut(300);

				// console.info(response);
				if(typeof response !== 'undefined' && response.length >0 ){

					for (var i=0, num=response.length; i< num; i++){

						// materias.push('<option value="'+response[i].Course.id+'"class="opcion">'+response[i].Course.name+'</option>');
						if(response[i].calificacion != null ){
							calificaciones.push('<p class="alumno">'+response[i].nombre+' calificacion del parcial '+parcial+': '+response[i].calificacion+'</p>');
						}else if (response[i].calificacion == 'null' ) {

						}

		// alert('No se encontraron materias para esta carrera y semestre');
						// NOTA CHECAR BIEN CUANDO ES NULL LA CALIFICACION
							


				}

				if($('p.alumno').length > 0 ){
				$('p.alumno').remove();

					// setTimeout(3000);
				$('section.pintaCalificaciones').append(calificaciones).hide().slideToggle(1000);
				}
				else {

				$('section.pintaCalificaciones').append(calificaciones).hide().slideToggle(1000);
				

				}

				}else {

				// $('p.alumno').remove();




							alert('El profesor no ah registrado calificaciones aun');
							$('p.alumno').slideToggle(900,function(){

							$('p.alumno').remove();
							});




				}



			}
		});

	}else {
		alert('Verifica bien las opciones para realizar la busqueda');
	}


 });
}

function regcuatrimestre(){

	$('#registrarCuatrimestre').on('submit',function(){

		fech1=$('input#inicioCuatri').val();
		fech2=$('input#finCuatrimestre').val();

		if(fech1 < fech2){
			return true;
		}else {
			alert('La fecha de inicio debe de ser menor a la del cierre de cuatrimestre');
			return false;
		}


	});

}

function horarioColumnas(){

	$(" span.ncolum" ).each(function(){
		valor= parseInt($(this).text());

		if(valor >=1 ){

		$(this).parent(0).attr('rowspan',valor);
		console.log($( this ).parent().get( 0 ).tagName);
		}else {

		}

	});
}

$(function(){
	clona();
	elimina();
	gruposXcarrera();
	getSemester();
	materiasXmaestro();
	toUppercase();
	incGoal();
	calificParcial();
	delimitaHrs();
	matxCuatyCarr();
	regcuatrimestre();
	$(".datepicker").datepicker();
	misAsistencias();
	// changecounter();
	// checkPorcentaje();
	// sumaPorcentaje();
	$("#GoalForm").on('submit',function(){
		checkPorcentaje();
		
		if(porcentajeFinal===100){
			return true;
		}else  {
			
			alert('tus porcentajes son erroneos deben ser = a 100');
			return false;
		}
	});

	horarioColumnas();

});


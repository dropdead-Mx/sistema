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
	var ejecucion=0;
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

	$('select#cuatrimestre,select#infocalif,select#indexPlaning,select#carreraCoordi,select#indexUploadExam').on('change',function(){
	$('select#materiasporcarrera,select#apendCoursePlanning,select#apendExam ').children('option.opcion').remove();
	
	carrera = $('select#infocalif option:selected,select#carreraCoordi option:selected,select.carreraSetExams').val();
	cuatri= $('select#cuatrimestre option:selected,select#indexPlaning option:selected,select#indexUploadExam option:selected, select.selectCuatri option:selected').val();
	materias=[];
	// alert('hols');
	if(carrera != 0 && cuatri != 0){
		// alert('ok');
		// console.log(cuatri);

		$.ajax({
			type:'GET',
			url:'/sistema/users/materiasporgerarquia/'+carrera+'/'+cuatri,
			success:function(response){
			

				console.info(response);

				if(typeof response !== 'undefined' && response.length >0 ){
				

				$('select#materiasporcarrera option[class="noMaterias"],select#apendCoursePlanning option[value="txt"],select#apendExam option[value="txt"]').text('--Materias Disponibles--');

					for (var i=0, num=response.length; i< num; i++){

						materias.push('<option value="'+response[i].Course.id+'"class="opcion">'+response[i].Course.name+'</option>');




				// alert('No se encontraron materias para esta carrera y semestre');


				}
					$('#materiasporcarrera,select#apendCoursePlanning').append(materias);
					$('select#apendCoursePlanning,select#apendExam,select#parcialUploadTest').attr('disabled',false);
					$('select#apendExam').append(materias);
					// $('button#buscaPlaneacion').fadeIn('slow');



			}else {
				// alert('No se encontraron materias para esta carrera y semestre');
				$('select#materiasporcarrera option[class="noMaterias"],select#apendCoursePlanning option[value="txt"],select#apendExam option[value="txt"]').text('--Sin materias disponibles--');

				$('select#apendCoursePlanning,select#parcialUploadTest,select#apendExam ').attr('disabled',true);
				btn=$('button#buscaPlaneacion').is(':visible');
				// if(btn === true ){
				// $('button#buscaPlaneacion').fadeOut('slow')	;
				// }
			}
		}


		});



	}else if( (carrera == 0 && cuatri >0 ) || (cuatri == 0 && carrera > 0) ){
		// alert('Porfavor selecciona una carrera y cuatrimestre para realizar la busqueda');
		$('select#materiasporcarrera option[class="noMaterias"]').text('--Sin materias disponibles--');
				


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

function materiasPorCoordinador(){

	$('button#buscarMaterias').on('click',function(){

	
		filas=[];
		tienemodulos=[];
		carrera = $('select#carreraCoordi option:selected').val();
		cuatrimestre = $('select#cuatriCoordi option:selected').val();

		// alert(carrera+" "+cuatrimestre);

		if( carrera != 0 && cuatrimestre != 0 ){
			// seccion ajax

			$.ajax({

				type:'GET',
				url:'../getcoursesbycoordinator/'+carrera+'/'+cuatrimestre,
				success:function(response){
				
				// console.info(response);
				// console.log('registros previos'+filas.length)
				
				if(typeof response !== 'undefined' && response.length >0 ){
				

						for(var  z= 0, num = response.length ; z < num; z++ ){

							
							//ajax anidado para ver si ya tiene modulos registrados

							tiene=$.parseJSON($.ajax({
								type:'GET',
								url:'../tienemod/'+response[z].Course.id,
								dataType:'json',
								async:false}).responseText);
							
							fila='<tr class ="filaMateria"><td>'+response[z].Course.id+'</td>'+'<td>'+response[z].Course.name+'</td>'+'<td>'+response[z].Course.semester+'</td>';
							if(tiene == "✓" ){
							filaFinal= fila+'<td><a href="../vermodulos/'+response[z].Course.id+'">Ver horario</a></td>'+'<td>'+tiene+'</td></tr>';
							}else {
							filaFinal=	fila+'<td><a href="../addModule/'+response[z].Course.id+'/'+carrera+'">Agregar Horario</a></td>'+'<td>'+tiene+'</td></tr>';
							}
							filas.push(filaFinal);
							
						}

						if ($('tr.filaMateria').length > 0 ){
							$('tr.filaMateria').remove();

						}

						$('table#listadoDeMaterias').append(filas).hide().fadeOut(1000);
						setTimeout(3000);

						$('table#listadoDeMaterias').fadeIn(1000);
					}
					else {

						alert('no se encontraron materias registradas');
						visible = $('table#listadoDeMaterias').is(':visible');
						
						if (visible == true ){
							$('table#listadoDeMaterias').fadeOut(1000);
							$('tr.filaMateria').fadeOut(900).setTimeout(900).remove();
							filas.length=0;

						}


					}

				}


			});


		}
	
			// alert('selecciona la carrera o cuatrimestre');

			// Seccion para busquedas con parametros incompletos
			if( carrera == 0 && cuatrimestre > 0 ){

				alert('seleccione una carrera de la lista');

			} else if (cuatrimestre == 0 && carrera > 0){

				alert('seleccione un cuatrimestre de la lista');

			} else if ( carrera == 0 && cuatrimestre == 0){
				alert('busqueda fallida ');
			}
		

	});
}


function mensajess(){
	contador = $('p.contadorMensaje');



	// $('#content > section > div.mnsgNuevo > strong').children('strong').css('color','red');
	$('div.mnsgNuevo strong.Nuevo').css('cursor','pointer');
	$()

	$('strong.Nuevo').on('click',function(){
		id=parseInt($(this).attr('data-id'));
		$.ajax({
			url:$(location).attr('href')+'leido/'+id,

			

		});

		if(parseInt(contador.text()) >= 1  ){
			contador.text(parseInt(contador.text())-1);
		}
	});


}

function verMensajesAnteriores() {
		$('button.verMensajes').on('click',function(){
		$(this).text('ocultar mensajes anteriores');
		$('div.mnsgLeidos').slideToggle('slow');
	});
}

function mensajepush(){
	timestamp=Math.floor(Date.now() / 1000);
	// timestamp=null;
	mensajesLeidos=[];
	mensajesNuevos=[];
	indicador=0;
	// ejecucion=[];
	contador = $('p.contadorMensaje');
	// $('div.mnsg').hide();

	// $('p.contadorMensaje:hover').css('cursor','pointer');

	// contador.on('click',function(){
		numero=parseInt(contador.text());
		console.log(numero);


	$.ajax({
		type:'GET',
		url:$(location).attr('href')+'leermensaje/'+timestamp,
		async:true,
		success:function(response){


		// console.info('primer ajax'+response);


			$.ajax({
				type:'GET',
				url:$(location).attr('href')+'listamensaje',
				async:true,
				success:function(response){
					// alert(response);
				// console.info(response.length);
				if( $('div.mensajito').length > 0 ){
					indicador=$('div.mensajito').length;
					$('div.mensajito').remove();
					mensajesLeidos.length=0;

				}

				if(typeof response !== 'undefined' && response.length >= 1  ){



					contador.attr('data-contador',response.length);
					// setTimeout(100);
					// indicador=response.length;
					if(indicador < contador.attr('data-contador') && ejecucion > 1){
						contador.text(parseInt(contador.text())+1);
					}else {
						// console.log(contador.text());
						// $('p.contadorMensaje').append('sin mensajes nuevos');
					}


					for(x=0, numero = response.length; x < numero; x++){

						// console.log(x)

					if(parseInt(response[x].Message.status) == 1 ){

					msn= '<div class="mensajito"  > <strong class="Nuevo" data-id="'+response[x].Message.id+'">'+response[x].Message.subject+'</strong><p>'+response[x].Message.mensaje+'</p></div>';
					mensajesNuevos.push(msn);
					} else if(parseInt(response[x].Message.status)  == 0 ) {

						msn= '<div class="mensajito"  > <strong>'+response[x].Message.subject+'</strong><p>'+response[x].Message.mensaje+'</p></div>';
						mensajesLeidos.push(msn);
					}
					// console.log(msn);


					}
				$('div.mnsgNuevo').append(mensajesNuevos);
				$('div.mnsgLeidos').append(mensajesLeidos);
				mensajess();
				ejecucion++;


				
					
				// alert('tiene un nuevo mensaje');
				}
				setTimeout('mensajepush()',1000);

				}
			});

		}
		


	});


}


function getCoordi(){
	$('select#materiaPlaneacion, select#materiaExamen').on('change', function(){
		// $('select#selectCoordi').addAttr('hidden');
		idmateria=parseInt($(this).val());
		$('.coordiOpcion').remove();

		if(typeof(idmateria) !== ''){

			$.ajax({
				url:'/sistema/plannings/coordinadorpormateria/'+idmateria,
				type:'GET',
				success:function(response){
					console.info(response);

					if(typeof(response) !== 'undefined' && response.length >=1 ){

						// for(x=0,numero=response.length;x<=numero;x++){

							coordinador= '<option class="coordiOpcion" value="'+response[0].User.id+'">'+response[0].User.name+'</option>';
							$('select#selectCoordi').append(coordinador);
							visible = $('select#selectCoordi').is(':visible');

							if(visible == true ){

							}else {
							$('select#selectCoordi').slideToggle('slow');

							}
							carrera=response[1].Course.career_id;
							$('input#carreraPlaneacion').val(carrera);
							$('input#planeacionPara').val(response[0].User.id);
							$('input#planeacionDescripcion').removeAttr('disabled');

						// }
					}else if(response.length <=0) {

				$('input#planeacionDescripcion').attr('disabled',true);
				$('input#planeacionDescripcion').val('');
				$('input#planeacionPara').val('');
				$('#planeacionAsunto').val('');
				$('#planeacionTextoMsn').val('')
				


					}
				}
			});
		}else {
			// alert('Seleccione una opcion correcta');
		}
		// alert(id);



	});

 	// $('input#planeacionDescripcion')

	$('input#planeacionDescripcion').keyup(function(){
	materia='Planeacion de la materia: '+$('select#materiaPlaneacion option:selected').text();
		// alert($("select#materiaPlaneacion option[value='"+idOpcion+"'']").text());
		console.log(materia);
		// $(this).val($(this).val().toUpperCase());
		$('#planeacionAsunto').val(materia);
		$('#planeacionTextoMsn').val($(this).val());
	});


	$('input#planeacionDescripcion').focusout(function(){
	materia='Planeacion de la materia: '+$('select#materiaPlaneacion option:selected').text();

		// $(this).val($(this).val().toUpperCase());
	$('#planeacionAsunto').val(materia);
		$('#planeacionTextoMsn').val($(this).val());



	});
	
	$('input#planeacionDescripcion').focus(function(){
	materia='Planeacion de la materia: '+$('select#materiaPlaneacion option:selected').text();

	$('#planeacionAsunto').val(materia);
		$('#planeacionTextoMsn').val($(this).val());


	});


	$('select#parcialExamen,select#materiaExamen').on('change',function(){
		para=$('select#selectCoordi option:selected').val();
		periodo=$('select#materiaExamen option:selected').val();
		materia=$('select#materiaExamen option:selected').val();
		asunto='Examen para imprimir de la materia: '+$('select#materiaExamen option:selected').text();
		texto='Nuevo examen disponible para descarga de la materia '+$('select#materiaExamen option:selected').text()+', Periodo: '+$('select#parcialExamen option:selected').text();
		console.log(para+' '+periodo+' '+materia+' '+texto);
		if( para >= 0 && periodo > 0 && materia >=0 ){
			$('#examenPara').val(para);
			$('#examenAsunto').val(asunto);
			$('#examenTexto').val(texto);

		}else {

			if(periodo = 0){

						alert('verifique sus acciones seleccionadas anteriormente');
			}else {

			$('select#parcialExamen option[value="0"]').attr('selected',true);

			$('#examenPara').val('');
			$('#examenAsunto').val('');
			$('#examenTexto').val('');

			}
	
		}


	});



}

function addPlannings(){

	$('select#apendCoursePlanning').on('change',function() {

		
		$('tr.filaPlaneacion').remove();

		carrera=$('select#carreraCoordi option:selected').val();
		cuatri=$('select#indexPlaning option:selected').val();
		materia=$('select#apendCoursePlanning option:selected').val();
		ident=$('table#tablaDePlaneaciones').attr('data-identifier');

		planeaciones=[];

		if(carrera !== 'txt' && cuatri !== 'txt' && materia !== 'txt' ){
			$('table#tablaDePlaneaciones').fadeOut('slow');
		

			$.ajax({

				type:'get',
				url:'../verplaneaciones/'+ident+'/'+materia,
				success:function(response){



					console.info(response);
					if(typeof(response) !== 'undefined' && response.length >= 1){


						for(z=0,num=response.length;z<num;z++){
						nombre='<tr class="filaPlaneacion"> <td>'+response[z].User.name+' '+response[z].User.apat+' '+response[z].User.amat+'</td>';
						fechaYDescripcion='<td>'+response[z].Planning.created+' </td> <td> '+response[z].Planning.description+'</td>';
						descarga='<td><a href="/sistema/plannings/download/'+response[z].Planning.id+'">'+response[z].Planning.planeacion+'</a></td></tr>';

						fila=nombre+fechaYDescripcion+descarga;

						planeaciones.push(fila);
							
						}


						$('tbody#tablaBody').append(planeaciones);
						
							// $('table#tablaDePlaneaciones').fadeOut('slow');
					
							$('table#tablaDePlaneaciones').fadeIn('slow');
						
						// $('table#tablaDePlaneaciones').slideToggle('slow');
					}

						
				}


				
			});

		}else {

			alert('verifica bien las opciones para realizar la busqueda');
		}


	});	

}
function addUploadTest(){



	$('select#parcialUploadTest,select#apendExam').on('change',function(){
		materia=$('select#apendExam option:selected').val();
		materiaNombre=$('select#apendExam option:selected').text();
		$('tr.filaExamen').remove();

		parcial=$('select#parcialUploadTest option:selected').val();
		examenesDescarga=[];
		if(materia !== 'txt' && parcial !== 'txt'){
			$('table#tablaDeExamenes').fadeOut('slow');

		$.ajax({
		type:'GET',
		url:'/sistema/uploadtests/getexams/'+materia+'/'+parcial,
		success:function(response){
			// console.info(response);

			if(typeof(response) !== 'undefined' && response.length >=1 ){

				for(w=0,num=response.length;w<num;w++){

					nombre='<tr class="filaExamen"><td>'+response[w].User.name+' '+response[w].User.apat+' '+response[w].User.amat+'</td>';
					fecha='<td>'+response[w].Uploadtest.created+'</td><td>Examen de la materia: '+materiaNombre+'</td>';
					descarga='<td><a href="/sistema/uploadtests/download/'+response[w].Uploadtest.id+'">'+response[w].Uploadtest.examen+'</a></tr>';

					fila=nombre+fecha+descarga;
					examenesDescarga.push(fila);

				}

			$('tbody#tablaBodyExamenes').append(examenesDescarga);
			$('table#tablaDeExamenes').fadeIn('slow');

			}
			 else if(response.length <=0){
					// alert('No se encontraron examenes para descarga');
				}
		}
	});
		}
	})
	



}

function asignarFechDeExamen(){

	$('select.selectCuatri').on('change',function(){

		numero=parseInt($(this).closest('tr').index()-1);
		$('option.opcion').remove();
		carrera=parseInt($('p.carreraSetExams').eq(numero).attr('data-id'));
		cuatri=$(this).val();
		materias=[];

		if(cuatri !== 'txt'){

			$.ajax({
				type:'GET',
				url:'/sistema/users/materiasporgerarquia/'+carrera+'/'+cuatri,
				success:function(response){
					console.info(response);
					if(typeof(response) !== 'undefined' && response.length >=1 ){

						for(x=0,num=response.length ;x<num;x++){

							opcion='<option class="opcion" value="'+response[x].Course.id+'">'+response[x].Course.name+'</option>';
							materias.push(opcion);
						}
						
						$('select.materiasExamen').eq(numero).children('option[value="txt"]').text('--Materias Disponibles--');
						$('select.materiasExamen').eq(numero).append(materias);
						$('select.materiasExamen').eq(numero).removeAttr('disabled');

					}else if(response.length <=0 ){
						$('select.materiasExamen').eq(numero).children('option[value="txt"]').text('--Sin materias disponibles--');
						$('select.materiasExamen').eq(numero).attr('disabled',true);
						$('select.selectCuatri option[value="txt"]').attr('selected',true);


					}
				}
			});


		}else {
			alert('Seleccione un cuatrimestre valido');
		}
	});

 	$('select.materiasExamen').on('change',function(){
		$('select.selectCuatri option[value="txt"]').attr('selected',true);
		materiaExamen=$('select.materiasExamen').eq(numero).children('option:selected').val();
		numero=parseInt($(this).closest('tr').index()-1);
		usrId=$('span.userId').attr('data-id'),

		$.ajax({
			type:'GET',
			url:'/sistema/exams/verify/'+materiaExamen,
			success:function(response){

				if(typeof(response) !== 'undefined' && response == 'noExiste'){
					// alert('no existe');
					link='<a class="enlaceRegistro" href="/sistema/exams/add/'+materiaExamen+'/'+usrId+'">Registrar Examenes</a>';
					$('td.link').eq(numero).append(link);
				}else {
					// agregar funcion editar fechas en controller si es que se cambian si no ps sudorr...:v

					$('td.link').eq(numero).append('<p> Ya se encuentran registradas fechas de examen </p>');

				}
			}
		});
		


 	});
}
$(function(){
	
	asignarFechDeExamen();
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
	materiasPorCoordinador();
	// console.log($(location).attr('href'));
	if($(location).attr('href') =='http://localhost/sistema/messages/'){

	mensajepush();
	}
	verMensajesAnteriores();
	// carrerasxcoordi();
	getCoordi();
	addPlannings();
	addUploadTest();

});


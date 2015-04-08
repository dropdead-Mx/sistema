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


$(function(){
	clona();
	elimina();
	gruposXcarrera();
	getSemester();
	materiasXmaestro();
	toUppercase();
	incGoal();
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


});


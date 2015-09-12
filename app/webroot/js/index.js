$(function(){


	$('p.iconoMenu').on('click',muestraMenu);
	$('div.cierreMenu').on('click',escondeMenu);
	$('div.alumnos').on('click',menuAlumnos);
	$('div.coordinador').on('click',coordinador);
});


function muestraMenu()
{
		$('nav').show('fast');
		$('nav').animate({left: '0'}, 'slow');
		$('p.iconoMenu').hide();
}

function escondeMenu()
{
		$('nav').animate({left: '-30%'}, 'slow');
		$('p.iconoMenu').show();
		$('div.alumnos p.tituloAlumnos').show();
		$('div.alumnos div.submenu').hide('slow');
		$('div.alumnos h2').css('margin','18% auto');
}

function menuAlumnos()
{
	
	$('div.alumnos p.tituloAlumnos').slideUp('fast');
	$('div.alumnos h2').css('margin','0% auto 5% auto');
	$('div.alumnos div.submenu').show('slow');
}


function coordinador()
{
	var clase=$(this).parent().parent().attr('class');	
	//var este=$(this).parent().parent().hasClass(clase);
	console.log(clase);
	if(clase=='vercarreras')
	{
			console.log("bien");
	var url="/sistema/users/indexcoordinator";
	$(location).attr('href',url);
	}
	else if (clase=='indexDirector') 
		{
			var url='users/indexcoordinator';
			$(location).attr('href',url);
		}
	else
	{
	var url='indexcoordinator';
	console.log("mal"); 
	$(location).attr('href',url);
	}
}
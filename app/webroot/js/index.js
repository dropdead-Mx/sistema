$(function(){
	$('div.bolita').on('click',muestraMenu);
	$('ul.menuPrincipal li.desplegar').on('click',muestraSubmenu);
	$('ul.submenuCoordi li').on('click',submenuCoordi);
	
});

function muestraMenu()
{
	$('ul.submenuCoordi').hide();
	$('ul.submenuAlumnos').hide();
	$('nav').show('slow');
	$('div.formulario').hide('slow');
}

function muestraSubmenu()
{

	//console.log($(this).next());
	$(this).next().toggle('slow');

}

function submenuCoordi()
{
	var opcion=$(this).data('opcion');
	console.log(opcion);
	if(opcion=='alta')
	{
		$('nav').hide('slow');
		$('div.formulario').show('slow');
	}
}

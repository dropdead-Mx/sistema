$(function(){
	$('ul.menuPrincipal li').on('click',menu);
	
});

function menu(elemento)
{
	$(this).children().toggle('slow')
	
}


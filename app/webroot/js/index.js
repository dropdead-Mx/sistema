$(function(){
	$('header li').on('click',menu);
	
});

function menu(elemento)
{
	$(this).children().toggle('slow')
	
}


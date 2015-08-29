$(function(){
	$('div.bolita').on('click',muestraMenu);
	$('ul.menuPrincipal > li').on('click',muestraSubmenu);
	
});

function muestraMenu()
{
	$('nav').show('slow');
}

function muestraSubmenu()
{
	$(this).children().toggle('slow');

}

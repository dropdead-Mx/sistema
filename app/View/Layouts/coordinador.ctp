<!DOCTYPE html>
<html lang="es">
<head>
	<?php echo $this->Html->charset();?>
	<title>Plataforma dorados</title>
	
	<?php 

	echo $this->Html->meta(array(
		'description'=>'Sistema integral de alumnos de la universidad dorados de oaxtepec'));
	echo $this->Html->css(array('normalize','director'));
	echo $this->Html->script(array('jquery','index'));

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
</head> 


<body>

	

	

	</header>

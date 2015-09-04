<?php

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>
		
		Plataforma Dorados
	</title>
	<?php
		// echo $this->Html->meta('icon');

		echo $this->Html->css(array('jquery-ui.min','normalize','login','menu','formularios','vistaCoordi'));
		echo $this->Html->script(array('jquery','jquery-ui.min','index'));
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		
		<div id="content">


			<?php echo $this->fetch('content'); 
			$tipo= $current_user['group_id'];
			if($tipo == 5){
			//echo $this->requestAction('/users/indexcoordinator',array('return'));
			//echo $this->element('menu');
			//echo $this->element('addcoordi');
			//echo $this->element('verCoordi');
			}else if($tipo == 7){
			// echo $this->element('lista');

			}
			?>

		<!-- linea para pintar errores en cake  -->
		
		</div>
	
	</div>

	<?php echo $this->Js->writeBuffer();?>
	
</body>
</html>

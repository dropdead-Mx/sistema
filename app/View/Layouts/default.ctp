<?php

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		
		Plataforma 
	</title>
	<?php
		// echo $this->Html->meta('icon');

		echo $this->Html->css(array('login','jquery-ui.min','normalize','general'));
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

			echo $this->element('menu');
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

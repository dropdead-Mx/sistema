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

		echo $this->Html->css(array('cake.generic','jquery-ui.min'));
		echo $this->Html->script(array('jquery','jquery-ui.min'));
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Plataforma Dorados</h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); 
			$tipo= $current_user['group_id'];
			if($tipo == 8){

			echo $this->element('texto');
			}else if($tipo == 7){
			echo $this->element('lista');

			}
			?>
		</div>
		<div id="footer">
		
			
			<p>
				<?php 
				// echo $cakeVersion; ?>
			</p>
		</div>
	</div>

	<?php echo $this->Js->writeBuffer();?>
</body>
</html>

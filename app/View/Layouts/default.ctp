<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('universidad_dorados', 'Plataforma Univesidad Dorados ');
$cakeVersion = __d('universidad_dorados', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
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
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			

			<?php echo $this->fetch('content'); 
			$tipo= $current_user['group_id'];
			if($tipo == 8){

			// echo $this->element('texto');
			}else if($tipo == 7){
			// echo $this->element('lista');

			}
			?>

		<!-- linea para pintar errores en cake  -->
		<div class="errores">
			
		<?php echo $this->Session->flash(); ?>
		</div>
		</div>
		<div id="footer">
		
			
			<p>
				<?php 
				// echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php 
	echo $this->element('sql_dump'); 
	?>
	<?php echo $this->Js->writeBuffer();?>
</body>
</html>

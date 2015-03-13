<!DOCTYPE html>
<html lang="es">
<head>
	<?php echo $this->Html->charset();?>
	<title>Bienvendo a la plataforma dorados</title>
	
	<?php 

	echo $this->Html->meta(array(
		'description'=>'Sistema integral de alumnos de la universidad dorados de oaxtepec'));
	echo $this->Html->css(array('normalize','estilo','http://fonts.googleapis.com/css?family=Roboto'));
	echo $this->Html->script(array('jquery'));

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
</head>


<body>

	<header>

	<div class="banner">
		<figure>
			<?php echo $this->Html->image("newlogo.png");?>
		</figure>

		<h1>Sistema Integral De Alumnos UD.</h1>
	</div>

	<div class="usuario">
		<figure><?php echo $this->Html->image('userfoto.png');?></figure>
		<p class="config">****configurar</p>
		<button class="logout">Salir</button>
	</div>

	</header>

	<h2>Area Administrativa</h2>

	<div class="contenedor">
		
		<section >

		<p>Alumnos</p>

		<?php echo $this->requestAction('/users/addStudent', array('return')); ?>

		<?php echo $this->requestAction('/users/indexStudent', array('return')); ?>



			
		</section>


		<!-- separador -->

		<section>

		<p>Profesores</p>

		<?php echo $this->requestAction('/users/addTeacher', array('return')); ?>
		<?php echo $this->requestAction('/users/indexTeacher', array('return')); ?>
			
		</section>

		<!-- separador -->


		<section>
		<p>Materias y Horarios</p>
		
		<?php echo $this->requestAction('/courses/index', array('return')); ?>
			<?php echo $this->requestAction('/courses/add', array('return')); ?>
			
		</section>

		<!-- separador -->


<!-- 		<section>


		<p>Calificaciones</p>

			
		</section> -->

		<!-- separador -->


<!-- 		<section>

		<p>Asistencias</p>

			
		</section> -->

		<!-- separador -->
<!-- 

		<section>

		<p >Examenes</p>

			
		</section> -->


	</div>

	
<!-- <footer>
	<p>Universidad Dorados Oaxtepec 2015</p>
</footer> -->
</body>
</html>
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

	<header>
		<figure class="logo">
			<?php echo $this->Html->image("logoNuevo.png");?>
		</figure>
		

	<div class="usuario">
		<figure>
			<?php echo $this->Html->image('userfoto.png');?>
		</figure>
		<h2>Director</h2>
		<h2>Dr.Oscar Polo Lopez Solis</h2>
	</div>

	<nav>
		<ul class="menuPrincipal">
			<li>Coordinadores 
				<ul class="submenuCoordi">
					<li>Alta</li>
					<li>Consulta</li>
				</ul>
			</li>
			<span class="iconCordi"></span>
			<li>Maestros </li>
			<span class="iconMaestro"></span>
			<li>Alumnos 
				<ul class="submenuAlumnos">
					<li>Calificaciones</li>
					<li>Asistencias</li>
				</ul>
			</li>
			<span class="iconAlumno"></span>
			<li>Archivos </li>
			<span class="iconFiles"></span>
			<li>Notificaciones </li>
			<span class="iconNotifi"></span>
			<li>Salir </li>
			<span class="iconLogout"></span>
		</ul>
	</nav>

	</header>


	<!-- <div class="contenedor">
	<h2>Area Administrativa</h2>
		
		<section >

		<p>Alumnos</p>

		<?php echo $this->requestAction('/users/addStudent', array('return')); ?>

		<?php echo $this->requestAction('/users/indexStudent', array('return')); ?>



			
		</section>


		

		<section>

		<p>Profesores</p>

		<?php echo $this->requestAction('/users/addTeacher', array('return')); ?>
		<?php echo $this->requestAction('/users/indexTeacher', array('return')); ?>
			
		</section>

		


		<section>
		<p>Materias y Horarios</p>
		
		<?php echo $this->requestAction('/courses/index', array('return')); ?>
			<?php echo $this->requestAction('/courses/add', array('return')); ?>
			
		</section>

		


	</div>

	 -->
<!-- <footer>
	<p>Universidad Dorados Oaxtepec 2015</p>
</footer> -->
</body>
</html>
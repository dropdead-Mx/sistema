<div class="menu">
<div class="encabezadoMenu">
<figure class="logoUni">
<?php echo $this->Html->image("logoNuevo.png");?>
</figure>
	<p></p>
</div>
	
<div class="usuario">
	
<figure class="fotoUser">
	
	<?php 
		echo $this->Html->image('../files/employee_profile/foto/'.$current_user['EmployeeProfile']['foto_dir'].'/'.'thumb_'.$current_user['EmployeeProfile']['foto']);
	 ?>
</figure>
<h2>Director</h2>
<h2>Dr.Oscar Polo Lopez </h2>
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


</div>
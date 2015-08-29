<div class="menu">
<div class="encabezadoMenu">
<figure class="logoUni">
<?php echo $this->Html->image("logoNuevo.png");?>
</figure>
	



	
	
<figure class="fotoUser">
	
	<?php 
		echo $this->Html->image('../files/employee_profile/foto/'.$current_user['EmployeeProfile']['foto_dir'].'/'.'thumb_'.$current_user['EmployeeProfile']['foto']);
	 ?>
</figure>
<div class="usuario">
<h2>Director</h2>
<h3>Dr.Oscar Polo Lopez </h3>
</div>
<div class="bolita">
<p></p>
</div>
</div>
<nav>
		<ul class="menuPrincipal">
			<span class="iconCordi"></span>
			<li>Coordinadores 
				<ul class="submenuCoordi">
					<li>Alta</li>
					<li>Consulta</li>
				</ul>
			</li>
			<span class="iconMaestro"></span>
			<li>Maestros </li>
			<span class="iconAlumno"></span>
			<li>Alumnos 
				<ul class="submenuAlumnos">
					<li>Calificaciones</li>
					<li>Asistencias</li>
				</ul>
			</li>
			<span class="iconFiles"></span>
			<li>Archivos </li>
			<span class="iconNotifi"></span>
			<li>Notificaciones </li>
			<span class="iconLogout"></span>
			<li>Salir </li>
		</ul>
	</nav>


</div>
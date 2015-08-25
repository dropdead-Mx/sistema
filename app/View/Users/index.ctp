
<h2>Bienvenido</h2>

<!-- linea para mostrar datos del usuario -->
<?php echo "HOLA ".$current_user['name']; ?>

<!-- linea para cerrar sesion -->
<a href="/sistema/users/logout">cerrar sesion</a>

<!-- linea para mostrar foto -->

 <?php 
// echo $this->Html->image('../files/employee_profile/foto/'.$current_user['EmployeeProfile']['foto_dir'].'/'.'thumb_'.$current_user['EmployeeProfile']['foto']);
?>
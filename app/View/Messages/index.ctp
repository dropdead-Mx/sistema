<h3>leer mensajes</h3>


<section>
	<strong>contador</strong>

	<p data-contador="0" class="contadorMensaje" onclick="leerMensajes">0</p>
	<div class="mnsgNuevo">

	<strong>Mensajes nuevos</strong>

	</div>

	<div class="mnsgLeidos" hidden >

		
		<strong>Mensajes leidos</strong>

	</div>

</section>

<style>
	div.mnsgNuevo,div.mnsgLeido {
		margin-bottom:6px;
		padding:8px 2px 5px 2px;
	}
	p.contadorMensaje {
		background: red;
		color:white;
		border-radius:60%;
		margin:0;
		padding:0;
		display:inline-block;
		padding:4px;
		width: 16px;
		text-align: center;
		font-weight: bold;
		font-size: 16px;
	}
</style>

<button class="verMensajes">Ver Mensajes anteriores</button>

<?php 

	echo $this->Html->script('scripts');

?>

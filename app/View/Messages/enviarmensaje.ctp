<h3>Enviar nuevo mensaje</h3>

<div class="mensajeNuevo">
	
<?php 
	// pr($user_id);
	echo $this->Form->create('Message');
	echo $this->Form->input('remitente',array('type'=>'hidden','value'=>$user_id));
	echo $this->Form->input('destinatario',array('label'=>'Destinatario','div'=>false,'type'=>'select','options'=>$coordinadores,
		'empty'=>'seleccione un coordinador','required'));
	echo $this->Form->input('subject',array('label'=>'asunto','div'=>false,'placeholder'=>'Escribe un asunto maximo 50 caracteres'));
	echo $this->Form->input('mensaje',array('label'=>'Nuevo mensaje: ','div'=>false));
	echo $this->Form->input('hora',array('label'=>'hora de envio','type'=>'hidden'));
	echo $this->Form->end('Enviar');

?>

</div>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8' />
		<link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="assets/javascripts/chat.js"></script>
	</head>
<body>	
	<?php 
		$colours = array('007AFF','FF7000','FF7000','15E25F','CFC700','CFC700','CF1100','CF00BE','F00');
		$user_colour = array_rand($colours);
	?>
	<div class="chat_wrapper">
		<div class="message_box" id="message_box"></div>
		<div class="panel">
			<input type="text" name="name" id="name" placeholder="Your Name" maxlength="10" style="width:20%"/>			
			<input type="text" name="palabra_clave" id="palabra_clave" placeholder="Palabra Clave" maxlength="20" style="width:20%"  />			
			<input type="text" name="message" id="message" placeholder="Message" maxlength="80" style="width:60%" />
			<button id="send-btn">Send</button>
		</div>
	</div>

</body>
</html>
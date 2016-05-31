<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8' />
    <link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-combined.min.css">
    <title>Chat</title>
</head>
<body>	
    <?php 
        $colours = array('007AFF','FF7000','FF7000','15E25F','CFC700','CFC700','CF1100','CF00BE','F00');
        $user_colour = array_rand($colours);
    ?>
    <div id="menu">
        <ul class="nav nav-pills">
            <li><a href="#">Encriptación Clasica</a></li>
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Encriptación Simétrica<b class="caret"></b>
              </a>
              <ul class="dropdown-menu" id="menu1">
                <li class="dropdown-submenu">
                  <a href="#">Algoritmo AES</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-header">Longitud de Llave</li>
                    <li><a href="#">Normal(128)</a></li>
                    <li><a href="#">Media(192)</a></li>
                    <li><a href="#">Fuerte(256)</a></li>                
                    <li><a href="#">Por Defecto</a></li>                
                  </ul>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#">Encriptación Asimétrica</a>
            </li>
        </ul>
    </div>

    
    <div class="chat_box">
       <div class="message_box" id="message_box"></div>
       <form method="post">    
            <div class="panel">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Tu nombre" maxlength="20" style="width:30%"/>
                </div>
                <div class="form-group">
                   <label for="message" style="width:40%">Mensaje</label>
                    <textarea class="form-control" name="message" id="message" cols="30" rows="3" style="width:100%"></textarea>
                </div>
                <div class="form-group">                    
                    <input type="button" id="send-btn" class="btn btn-primary" value="Enviar">
                </div>
            </div>
        </form> 
    </div>

    <!--SCRIPTS-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/cliente.js"></script>


</body>
</html>
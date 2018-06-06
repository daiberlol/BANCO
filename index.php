<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 

include_once (__DIR__.'/Sistemas/Controllers/UsuarioController.php');
include_once (__DIR__.'/Sistemas/Models/Usuario.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login :: w3layouts</title>

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Space Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<!-- css files -->
<link href="Sistemas/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- css files -->

<!-- Online-fonts -->
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
<!-- //Online-fonts -->

</head>
<body>
<?php
session_start();
if(isset($_SESSION['login']) && $_GET['salir']==0){
	unset($_SESSION['login']);
    session_destroy();
}else{

 if(isset($_POST['Email'])){
	 
     
   $name = $_POST['Email'];
   $paw = $_POST['Password'];
   
   $usuarioController = new UsuarioController();
   $usuario = new Usuario();
   
   
   $usuario = $usuarioController->SearchUsu($name, $paw);
   $sw = $usuarioController->Login($name,$paw);
   

	 
    if($sw==1){
            session_start();
            $_SESSION['nombre'] = $usuario->getUsu_nombre()." ".$usuario->getUsu_apellido()['usu_apellido']; 
            $_SESSION['correo'] = $name;
            $_SESSION['login']  = true;
            $_SESSION['rol'] = $usuario->getUsu_rol();
            header('location: ./Sistemas/index.php');
     }else{
        echo "<script>alert('Datos de ingreso incorrectos'); </script>";
     }

 }
}

?>
	<!-- main -->
	<div class="main">
		<div class="main-w3l">
			<h1 class="logo-w3">Ingreso a tienda</h1>
			<div class="w3layouts-main">
				<h2><span>Ingrese ahora</span></h2>
				
					<form method="post">
						<input placeholder="Username or Email" name="Email" id="email" type="email" required>
						<input placeholder="Password" name="Password" id="password" type="password" required>
						<input type="submit" value="Ingresar" id="login" name="login">
					</form>
					<h6><a href="#">Olvido su contraseña?</a></h6>
			</div>
			<!-- //main -->
			
			<!--footer-->
			<div class="footer-w3l">
				<p>&copy; 2017 Space Login Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
			<!--//footer-->
		</div>
	</div>

</body>
</html>

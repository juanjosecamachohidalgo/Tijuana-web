<?php



@session_start();
if(isset($_SESSION['username'])){
	unset ($_SESSION['username']);
	session_destroy();
	}
	
	//session_start();
	
 	setcookie("consulta","default",time()+86400);
 	
 	$_SESSION['direccion']='www.tijuanatequilaalmeria.com';
 	$_SESSION['usuario']='tijuana';
 	$_SESSION['contraseña']='tequila';
?>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />


<title>Tijuana Tequila</title>
</head>

<link href="https://fonts.googleapis.com/css?family=Comfortaa|Kaushan+Script" rel="stylesheet">

<!--Css principal-->
<link href="productos.css" rel="stylesheet" type="text/css">
<!----->

 <!-- Menú- Icon Library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">






<body class="body">

<!--Cabecera-->
<header class="cabecera">




   
</header>





 




 <!-- Contacto -->
 <section class="contenedorContacto" align="center">

 
 <div style="margin-top:15%;" align="center">
 
 <?php

if(isset($_POST['tryLogin']))
{
		$user=$_POST['tryUser'];
		$pass=$_POST['tryPass'];
		$consulta = "select * from administrador where usuarioAdministrador= '".$user."' and passwordAdministrador= '".$pass."'";
			$conexion = mysqli_connect($_SESSION['direccion'] , $_SESSION['usuario'] , $_SESSION['contraseña'],"mydb");	
			$resultados=mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
			$cont=0;
			while($array_res=mysqli_fetch_array($resultados)){ 
				$cont=1;
			}
			if($cont==1)
			{
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $user;
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (60 * 6000);
				header("Location: Administrador-index.php");
				///echo "Bienvenido! " . $_SESSION['username'];

			}
			else
			{
				echo "<h2 style=\"color: red;\">No existe</h2>";
			}
			
			mysqli_free_result($resultados); 
	
}
?>

 <div><img width="150px" class="logo" src="../images/logo.jpg"></div>


	<form method="post">
	<h2><b>Tijuana - Inicio de sesi&oacute;n</b></h2>
	<div style="margin-bottom:1%;">
	<h4><b>Usuario</b></h4>
	<input name="tryUser" type="text"/>
	</div>
	<div style="margin-bottom:2%;">
	<h4><b>Contrase&ntilde;a</b></h4>
	<input name="tryPass" type="password"/>
	</div>
	<button name="tryLogin"><b>Acceder</b></button>
	</form>
 </div>
 </section>
 

 

 
</body>
</html>
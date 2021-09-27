


<html>
<?php
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
	{ 
	 if(isset($_SESSION['username']))
	 { 
		$consulta = "select * from administrador where usuarioAdministrador= '".$_SESSION['username']."'";
		$conexion = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila","mydb");	
		$resultados=mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
		while($array_res=mysqli_fetch_array($resultados))
		{ 
				$god=$array_res['isGod'];
				if($god==false)
				{
					echo "Esta pagina es solo para el jefe.<br>";
					exit;
				}
		}
	 }
	 
	}
	else 
	{
	   echo "Esta pagina es solo para usuarios registrados.<br>";
	   echo "<br><a href='inicio-sesion.php'>Login</a>";
	   exit;
	}
?>
<head>
	<title>Crear usuario</title>
</head>
<link href="crear-evento.css" rel="stylesheet" type="text/css">
<link href="estilo-evento.php" rel="stylesheet" type="text/css">
<body>

<div class ="style-title-evento">
<h2>Usuarios:</h2>
</div>

<?php 
	if(isset($_POST['eliminar_usuario'])){
		$nombre = $_POST['usuario'];
	
		$conexion=@mysql_connect("www.tijuanatequilaalmeria.com","tijuana","tequila");
		mysql_select_db("mydb",$conexion);
	
	
		$deleteUsuario ="DELETE FROM administrador WHERE usuarioAdministrador=\"$nombre\"";
	
	
		mysql_query($deleteUsuario,$conexion) or die("Error de servidor");
		mysql_close($conexion);

	}
	$list_usuario = "SELECT * FROM administrador WHERE isGod=FALSE";
	$conexion=@mysql_connect("www.tijuanatequilaalmeria.com","tijuana","tequila");
	mysql_select_db("mydb",$conexion);
	
	$list_usuario = mysql_query($list_usuario,$conexion) or die("Error de servidor");
	

	while($fila = mysql_fetch_array($list_usuario)){
		$nombre = $fila['nombreAdministrador'];
		$correo = $fila['correoAdministrador'];
		$telefono=$fila['telefonoAdministrador'];
		$usuario=$fila['usuarioAdministrador'];
		$password =$fila['passwordAdministrador'];
		
		echo"
			<form method=\"post\">
			<div class=\"style-crear-evento\">
			<h3>Usuario: #".$fila['idAdministrador']."</h3>
			<div>
			<label for=\"nombre\">Nombre: </label>
			<input name=\"nombre\" maxlength=\"45\" type=\"text\" value=\"$nombre\"/>
			</div>
			<div>
			<label for=\"correo\">e-mail: </label>
			<input name=\"correo\" maxlength=\"255\" type=\"text\" value=\"$correo\"/>
			</div>
			<div>
			<label for=\"telefono\">Telefono: </label>
			<input name=\"telefono\" maxlength=\"9\" type=\"text\" value=\"$telefono\"/>
			</div>
			<div>
			<label for=\"usuario\">Usuario: </label>
			<input name=\"usuario\" maxlength=\"45\" type=\"text\" value=\"$usuario\"/>
			</div>
			<div>
			<label for=\"password\">Contrase&ntilde;a: </label>
			<input name=\"password\" maxlength=\"45\" type=\"password\" value=\"$password\"/>
			</div>
			<div>
			<button name=\"eliminar_usuario\">Eliminar usuario</button>
			</div>
			</div>
			</form>
		";
	}
	
	mysql_close($conexion);
	
?>

<div align="center">
	<a href="Administrador-contacto.php"><h3>Volver</h3></a>
</div>
</body>
</html>
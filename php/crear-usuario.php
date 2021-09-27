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
<link href="../css/crear-evento.css" rel="stylesheet" type="text/css">
<body>

<?php 
	if(isset($_POST['crearUsuario'])){
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		$telefono=$_POST['telefono'];
		$usuario=$_POST['usuario'];
		$password =$_POST['password'];
		
		$conexion=@mysql_connect("www.tijuanatequilaalmeria.com","tijuana","tequila");
		mysql_select_db("mydb",$conexion);
		
		
		$nuevoUsuario ="INSERT INTO administrador (usuarioAdministrador, passwordAdministrador,nombreAdministrador,correoAdministrador,telefonoAdministrador) 
			VALUES (\"$usuario\",\"$password\", \"$nombre\", \"$correo\", \"$telefono\");"; 
		
		
		mysql_query($nuevoUsuario,$conexion) or die("Error de servidor");
		mysql_close($conexion);
		
	}
?>
<div class ="style-title-evento">
<h2>Crear nuevo usuario:</h2>
</div>
<div class="style-crear-evento">
<form method="POST">
	<div>
		<label for="nombre">Nombre: </label>
		<input name="nombre" maxlength="45" type="text" id="nombre"/>
	</div>
	<div>
		<label for="correo">e-mail: </label>
		<input name="correo" maxlength="255" type="text" id="nombre"/>
		</div>
		<div>
		<label for="telefono">Telefono: </label>
		<input name="telefono" maxlength="9" type="text" id="nombre"/>
		</div>
		<div>
		<label for="usuario">Usuario: </label>
		<input name="usuario" maxlength="45" type="text" id="nombre"/>
		</div>
		<div>
		<label for="password">Contrase&ntilde;a: </label>
		<input name="password" maxlength="45" type="password" id="nombre"/>
		</div>
	
	<div class="button">
	<button name="crearUsuario" value="boton">Crear usuario</button>
	</div>
</form>
</div>

<div align="center">
	<a href="Administrador-contacto.php"><h3>Volver</h3></a>
</div>
</body>
</html>
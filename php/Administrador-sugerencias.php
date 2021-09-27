<html>
<head>
	<title>Sugerencias</title>
</head>
<link href="estilo-sugerencia.php" rel="stylesheet" type="text/css">
<?php 

//--codigo permisos usuario--//
	session_start();
	//echo $_SESSION['loggedin']."	".$_SESSION['loggedin'];

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	 //echo "HOOOOLI";
	} 
	else {
	   echo "Esta pagina es solo para usuarios registrados.<br>";
	   echo "<br><a href='inicio-sesion.php'>Login</a>";
	   exit;
	}
	?>

<body>

<h1>Sugerencias:</h1>
<div align="center">
	<a href="Administrador-contacto.php" value="Volver">Volver</a>
</div>
<?php 
	$conexion=@mysql_connect("www.tijuanatequilaalmeria.com","tijuana","tequila");
	mysql_select_db("mydb",$conexion);
	
	$lista_sugerencias = "SELECT * FROM sugerencia ORDER BY fechaSugerencia DESC";
	$lista_sugerencias = mysql_query($lista_sugerencias,$conexion) or die("Error de servidor");
	
	while($fila = mysql_fetch_array($lista_sugerencias)){
		echo "
			<form method=\"post\">
			<div class=\"style-sugerencia\">
				
				<h2>
				Sugerencia #".$fila['idSugerencia']."
				</h2>
				Email: ".$fila['emailSugerencia']."
				<br>
				Fecha envio: ".$fila['fechaSugerencia']."
				<br>
				<br>
				<textarea class=\"style-sugerencia-content\"rows=\"10\" cols=\"75\" disabled>"
				.$fila['mensajeSugerencia'].
				"</textarea>
				<br>
				<br>
				<button name=\"eliminar_sugerencia\" value=\"".$fila['idSugerencia']."\">Eliminar sugerencia</button>	
			</div>
			</form>
			";
	}
	
	if(isset($_POST['eliminar_sugerencia'])){
		$idSugerencia = $_POST['eliminar_sugerencia'];
		
		$deleteSugerencia = "DELETE FROM sugerencia WHERE idSugerencia=$idSugerencia";
	
		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("mydb",$conexion);
		mysql_query($deleteSugerencia,$conexion) or die("Error de servidor");
	
		mysql_close($conexion);
	}
?>

</body>
</html>
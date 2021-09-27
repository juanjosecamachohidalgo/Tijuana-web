<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Galeria - Tijuana Tequila</title>
</head>
  
  <!--Css principal-->
<link href="../css/main.css" rel="stylesheet" type="text/css">
<link href="../css/galeria.css" rel="stylesheet" type="text/css">
<link href="../css/fotos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="estilo-galeria.php">
<!--<link rel="stylesheet" href="estilo-fotos.php">-->
<script src="../js/menu.js" type="text/javascript"></script>

<!-- Menú- Icon Library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<body class="body">
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
<!--Cabecera-->
<header class="header">
                      
<!--Logo-->
<div class="headerContainer">

<div class="containerLogo">
	<img class="logo" src="../images/logo.jpg">
</div>


                    <!--Menu-->
<div class="menuContainer">
<ul class="topnav" id="myTopnav">
 
  <li><a class="active" href="Administrador-index.php"><i class="fa fa-fw fa-home"></i>Inicio</a></li>
  <li><a href="Administrador-galeria.php"><i class="fa fa-fw fa-camera"></i>Galer&iacutea</a></li>
  <li><a href="Administrador-eventos.php"><i class="fa fa-fw fa-angellist"></i>Eventos</a></li>
  <li><a href="Administrador-productos.php"><i class="fa fa-fw fa-coffee"></i>Productos</a></li>
  <li><a href="Administrador-contacto.php"><i class="fa fa-fw fa-phone-square"></i>Contacto</a></li>
  <li><a href="../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
</ul></div>



</div>
<div class="lineaBlanca"></div>
                                          

    <!--Sub-Menu-->
 <nav>
  <ul class ="topnav2" id="myTopnav">
      <li><a title="Subir foto" href="subir-foto.php">Subir foto</a></li>
      <li><a title="<- Atr&aacutes" href="Administrador-galeria.php"><- Atr&aacutes</a></li>
	  </ul>
</nav>
</header> 
 <!-- Servicios -->
 
 		<div class="contenidoGaleria">
 	
 		 
		<?php 
		$filtrado = FALSE;
	
		if(isset($_POST['album'])){
			$nombreAlbum = $_POST['album'];
			echo "<h3>".$nombreAlbum."</h3>";
			$idAlbum = "SELECT idAlbum FROM album WHERE nombreAlbum = \"$nombreAlbum\"";
			$conexion = @mysql_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila");
			
			mysql_select_db("mydb", $conexion);
			$idAlbum = mysql_query($idAlbum,$conexion) or die("Error de servidor"); 
			$idAlbum = mysql_fetch_array($idAlbum);
			mysql_close($conexion);
			setcookie("cookie_idAlbum",$idAlbum['idAlbum'],time());
			$foto_album = "SELECT * FROM foto WHERE Album_idAlbum=".$idAlbum['idAlbum']. " ORDER BY fechaFoto DESC;";
			
			mostrarFotos($foto_album);	
		}
		
		if(isset($_POST['eliminar_foto'])){
			$foto = $_POST['eliminar_foto'];
			
			$array = explode("-", $foto);
			$idFoto = $array[0];
			$idAlbum = $array[1];
			$conexion = @mysql_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila");
			mysql_select_db("mydb", $conexion);
			
			$borrar_foto = "DELETE FROM foto WHERE idFoto=".$idFoto;
			$foto_album = "SELECT * FROM foto WHERE Album_idAlbum=".$idAlbum." ORDER BY fechaFoto DESC;";
			mysql_query($borrar_foto,$conexion) or die("Error de servidor"); 
			$nombreAlbum = "SELECT nombreAlbum FROM album WHERE idAlbum=".$idAlbum.";";
			$nombreAlbum = mysql_query($nombreAlbum,$conexion) or die("Error de servidor");
			
			$nombreAlbum = mysql_fetch_array($nombreAlbum);
			
			mysql_close($conexion);
			
			echo "<h3>".$nombreAlbum['nombreAlbum']."</h3>";
			mostrarFotos($foto_album);
		}
	
		function mostrarFotos($consulta){
			$conexion=@mysql_connect("www.tijuanatequilaalmeria.com","tijuana","tequila");
			mysql_select_db("mydb",$conexion);
			$list_foto=null;
				
			$list_foto = mysql_query($consulta,$conexion) or die ("Error de servidor");
			
			$fila=null;
			$totalFotos = 0;
			//$pagina=new PHPPaging;
			//$pagina->agregarConsulta($consulta);
			//$pagina->ejecutar();
			
			//Primer bucle para los li
			$fotoContador = 1;
			while($fila = mysql_fetch_array($list_foto)){
				echo"
				<div style=\"display:inline-block;margin:1%;\">
				<img class=\"imagen\" src=\"".$fila['imagenFoto']."\">
				<form method=\"post\">
				<button name=\"eliminar_foto\" value=\"".$fila['idFoto']."-".$fila['Album_idAlbum']."\">Eliminar foto</button>
				</form>
				</div>";
				
			}
			
			mysql_free_result($list_foto);
			mysql_close($conexion);
		}
		
		?> 

		
</div>

 
 <!--pie
 <footer class="footer">
	<div>
		<font color="#FFFFFF">Copyright &#169 2017 Tijuana Tequila. Todos los derechos reservados.</font>  
     </div>		
 </footer>--> 
</body>

</html>
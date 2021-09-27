<?php
	require_once("../paginacion/PHPPaging.lib/PHPPaging.lib.php");
	

?>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />


<title>Tijuana Tequila</title>
</head>

<link href="https://fonts.googleapis.com/css?family=Comfortaa|Kaushan+Script" rel="stylesheet">

<!--Css principal-->
<link href="../css/productos.css" rel="stylesheet" type="text/css">
<link href="../css/contacto.css" rel="stylesheet" type="text/css">
<link href="../css/menu.css" rel="stylesheet" type="text/css">
<!----->


<!--Menú-->
             <!--Menú-jQuery-->
   <script src="http://code.jquery.com/jquery-latest.min.js" type=   "text/javascript"></script>
             <!--Menú-Plugin-->
<script src="../js/menu.js" type="text/javascript"></script>
   <script src="js/script.js"></script>
             <!-- Menú- Icon Library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!---->


               <!--Bootstrap-->
               
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!---->
<!---->
<!----><!----><!---->
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
<body class="body">

<!--Cabecera---------------------------------------------------------------------------------------->
<header class="header">
                      
<!--Logo-->
<div class="headerContainer">
<div class="containerLogo"><img class="logo" src="../images/logo.jpg"></div>




                    <!--Menu-->
<div class="menuContainer">
<ul class="topnav" id="myTopnav">
 
  <li><a class="active" href="Administrador-index.php"><i class="fa fa-fw fa-home"></i>Inicio</a></li>
  <li><a href="Administrador-galeria.php"><i class="fa fa-fw fa-camera"></i>Galería</a></li>
  <li><a href="Administrador-eventos.php"><i class="fa fa-fw fa-angellist"></i>Eventos</a></li>
  <li><a href="Administrador-productos.php"><i class="fa fa-fw fa-coffee"></i>Productos</a></li>
  <li><a href="Administrador-contacto.php"><i class="fa fa-fw fa-phone-square"></i>Contacto</a></li>
   <li><a href="../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:20px;" onclick="myFunction()">☰</a>
  </li>
</ul></div>



</div>
<div class="lineaBlanca"></div>
                                          

<!--FinCabecera-------------------------------------------------------------------------------->
</div>
<div>
</div>
<div id="header2"style="z-index:50;"> </div>

<!--	----------------------	 -->
<div align="center">
<nav id="cssmenu" style="z-index:1; margin-top:0;">
  <ul>
	 <li style="margin-bottom: -20px;">
	  <a href="Administrador-newEvento.php" target="_blank"> + Añadir evento</a>
	  </li>
	  <li style="padding-top: 12px; margin-bottom: -20px; margin-left: 15px;">
	  <form name="sort" action="Administrador-eventosOrdenados.php" method="post">
		<select name="order">
			<option>-</option>
			<option value="order by fechaEvento ASC">Fecha ascendente</option>
			<option value="order by fechaEvento DESC">Fecha descendente</option>
		</select>
		<button name="ordenar" style="color: grease;">Ordenar</button>
	   </form>
	   </li>
	   <li style="padding-top: 12px; padding-bottom: 0px; margin-left: -10px;">
	   <form action="Administrador-eventosFiltrados.php" name="busqueda" method="post">
		<input type="text" style="width: 50%;" name="busquedaEvento" id="BusquedaProducto">
		<button name="buscar"><li>Buscar</li></button>
	   </form>
	   </li>
	</ul>
  </nav>
  </div>
</header>
</br>

 <!-- Contacto -->
 <section class="contenedorContacto" style="margin-top:260px; " align="center">
<div align="center">	
		<?php
	 
//include 'newProducto.php';

	if(isset($_POST['crearEvento'])){

		$conn = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila", "mydb");
		
		$evento=utf8_decode($_POST['evento']);
		$descBreve=utf8_decode($_POST['descripcionBreve']);
		$descComp=utf8_decode($_POST['descripcionCompleta']);
		$imagen=utf8_decode($_POST['imagen']);
		$fecha=utf8_decode($_POST['fecha']);
		
		$boolSubir=true;
		
		if($evento=="")
		{
			$boolSubir=false;
			echo "<font size=\"5\" color=\"red\">Error, nombre vacio</font>";	
			echo "</br>";
		}
		if($fecha=="dd/mm/aaaa"||$fecha=="")
		{
			$boolSubir=false;
			echo "<font size=\"5\" color=\"red\">Error, imagen vacia</font>";	
			echo "</br>";
		}
		else
		{
			$time = strtotime($fecha);
			$newformat = date('d-m-Y',$time);
			
			$arrFecha=getdate();
			$año=(int)$arrFecha['year'];
			$mes=(int)$arrFecha['mon'];
			$dia=(int)$arrFecha['mday'];
			
			$fechaHoy=$dia."-".$mes."-".$año;
		
			$time2 = strtotime($fechaHoy);
			$newformat2 = date('d-m-Y',$time2);
			
			if($newformat<$newformat2){
				//$boolSubir=false;
				//echo "<font size=\"5\" color=\"red\">Error, fecha no valida</font>";	
				//echo "</br>";
			}

		}
		if($descBreve=="")
		{
			$boolSubir=false;
			echo "<font size=\"5\" color=\"red\">Error, descripción breve vacia</font>";	
			echo "</br>";
		}
		if($descComp=="")
		{
			$boolSubir=false;
			echo "<font size=\"5\" color=\"red\">Error, descripción completa vacia</font>";	
			echo "</br>";
		}
		if($imagen==""||$imagen=="URL Imagen")
		{
			$boolSubir=false;
			echo "<font size=\"5\" color=\"red\">Error, imagen vacia</font>";	
			echo "</br>";
		}
		
		if($boolSubir==true){
			$sql="select nombreEvento from evento where nombreEvento='".$evento."'";
			$total = mysqli_num_rows(mysqli_query($conn, $sql));
			if($total==0){

				$sql = "INSERT INTO evento (nombreEvento, descripcionEvento, imagenEvento, descripcionBreveEvento, fechaevento)
				VALUES ('".$evento."','".$descComp."','".$imagen."','".$descBreve."','".$fecha."')";
				mysqli_query($conn, $sql);
				echo "<font size=\"5\" color=\"green\">	Evento creado</font>";
			}
			else
			{
		
				echo "<font size=\"5\" color=\"red\">	Este evento ya existe</font>";
			}
			
			
			//mysql_close($conn);
		}
		}
	
?>

	
	<form action="Administrador-newEvento.php" method="POST">
		<div>
		<img style="border-style: solid; border-width: 1px; width:500px; height:300px; margin-bottom:1%;" id="imgEvento" src=""/>
		<div style="margin-bottom:1%; align="center">
			<b>Imagen</b>
			</br>
			<input type="text" name="imagen" id="URL Imagen" value="" onclick="borrarTexto(this.id)">
			<button  type="button"  id="botonImagen" onclick="mostrarImg()" >Mostrar</button>
		</div>
		</div>
		
		<b>Fecha del evento</b>
		</br>
		<input style="margin-bottom:1%;" type="date" name="fecha">
		</br>
		
		<b>Nombre del evento</b>
		
		<p><textarea style="resize: none;" name="evento" id="Evento" onclick="borrarTexto(this.id)" rows="2" cols="75"></textarea></p>
		<b>Descripcion breve</b>
		<p><textarea style="resize: none;" name="descripcionBreve" id="Descripcion breve" onclick="borrarTexto(this.id)"rows="5" cols="75"></textarea></p>
		<b>Descripcion completa</b>
		<p><textarea style="resize: none;" name="descripcionCompleta" id="Descripcion completa" onclick="borrarTexto(this.id)"rows="15" cols="75"></textarea></p>
		
		<button name="crearEvento" ><h4><b>Crear evento</b></h4></button>
	
		

	</form>
 
</div>

		
 </section>
  <script>
 function mostrarImg(){
	 var img=document.getElementById("URL Imagen").value;
	 document.getElementById("imgEvento").src=img;
 }
 </script>

 
<!--pie-------------------------------------------------------------------------------------------->
 
 <footer class="footer">
	<div>
		<font color="#FFFFFF">Tijuana Tequila Hostelería S.L. CIF B-04759411. Calle Álvarez de Castro nº2, 04001, Almería.</font>  
     	
		
     </div>	
	 	
		<!--<font color="#FFFFFF">  
		     <i class="fa fa-facebook" aria-hidden="true"></i>	
             <i class="fa fa-instagram" aria-hidden="true"></i>  
        </font>			 -->
		
     </div>	
 </footer>
 
</body>
</html>
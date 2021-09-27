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
	
	if(isset($_POST['modificarEventoActu'])){

		$nombreEventoAntiguo=$_POST['modificarEventoActu'];
		$conn = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila", "mydb");
		
		$evento=utf8_decode($_POST['evento']);
		$descBreve=utf8_decode($_POST['descripcionBreve']);
		$descComp=utf8_decode($_POST['descripcionCompleta']);
		$imagen=utf8_decode($_POST['imagen']);
		$fecha=utf8_decode($_POST['fecha']);

		$time = strtotime($fecha);
		$newformat = date('d-m-Y',$time);
			
		$arrFecha=getdate();
		$año=(int)$arrFecha['year'];
		$mes=(int)$arrFecha['mon'];
		$dia=(int)$arrFecha['mday'];
			
		$fechaHoy=$dia."-".$mes."-".$año;
	
		$time2 = strtotime($fechaHoy);
		$newformat2 = date('d-m-Y',$time2);
		
		//---ARREGLAR ESTO DE AQUI--//
		
		//echo $newformat."	".$newformat2;
		if($newformat<$newformat2){
			//$boolSubir=false;
			//echo "<font size=\"5\" color=\"red\">Error, fecha no valida</font>";	
			//echo "</br>";
			//return;
		}
		$sSQL="select * From evento Where nombreEvento='".$evento."' and (nombreEvento <> '".$nombreEventoAntiguo."' )";
		$total = mysqli_num_rows(mysqli_query($conn, $sSQL));
		if($total==0)
		{
			$sql = "update evento SET nombreEvento='".$evento."' , descripcionEvento='".$descComp."', fechaEvento='".$fecha."' , descripcionBreveEvento='".$descBreve."' , imagenEvento='".$imagen."'
					where nombreEvento='".$nombreEventoAntiguo."'";	
	
			mysqli_query($conn, $sql);
			echo "<font size=\"15\" color=\"green\">	Modificado correctamente</font>";
			
		}
		else
		{
			echo "<font size=\"15\" color=\"red\">	El nombre introducido ya existe</font>";
		}

		}
	
    else if(isset($_POST['modificarEvento']))
	{
		
		$nombreEvento = @$_POST['modificarEvento'];		
			

			
			$sSQL="select * From evento Where nombreEvento='".$nombreEvento."'";
			$conexion = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila", "mydb");
			//mysql_select_db("mydb", $conexion);		
			$resultados=mysqli_query($conexion, $sSQL) or die ("Error de servidor");
			
			
			while($array_res=mysqli_fetch_array($resultados)){ 
				//--Valores del producto--
				$nombre=$array_res['nombreEvento'];
				$descBreve=$array_res['descripcionBreveEvento'];
				$descComp=$array_res['descripcionEvento'];
				$imagen=$array_res['imagenEvento'];
				$fecha=$array_res['fechaEvento'];
				$time = strtotime($fecha);
				$newformat = date('Y-m-d',$time);
			//	echo $nombre."	hola";
				
				//echo $newformat;
				echo "
					
					 <form action=\"Administrador-modificarEvento.php\" method=\"POST\">
						<div>
							<img style=\"border-style: solid; border-width: 1px; width:500px; height:300px; margin-bottom:1%;\" id=\"imgEvento\" src=\"".$imagen."\"/>
							<div style=\"margin-bottom:1%\" align=\"center\">
								<b>Imagen</b>
								</br>
								<input type=\"text\" name=\"imagen\" id=\"URL Imagen\" value=\"".$imagen."\" onclick=\"borrarTexto(this.id)\">
								<button  type=\"button\"  id=\"botonImagen\" onclick=\"mostrarImg()\" >Mostrar</button>
							</div>
						</div>
		
						<b>Fecha del evento</b>
						</br>
						<input style=\"margin-bottom:1%;\" type=\"date\" name=\"fecha\" value=\"".$newformat."\">
						</br>
		
						<b>Nombre del evento</b>
		
						<p><textarea style=\"resize: none;\" name=\"evento\" id=\"Evento\" onclick=\"borrarTexto(this.id)\" rows=\"2\" cols=\"75\">".$nombre."</textarea></p>
						<b>Descripcion breve</b>
						<p><textarea style=\"resize: none;\" name=\"descripcionBreve\" id=\"Descripcion breve\" onclick=\"borrarTexto(this.id)\"rows=\"5\" cols=\"75\">".$descBreve."</textarea></p>
						<b>Descripcion completa</b>
						<p><textarea style=\"resize: none;\" name=\"descripcionCompleta\" id=\"Descripcion completa\" onclick=\"borrarTexto(this.id)\"rows=\"15\" cols=\"75\">".$descComp."</textarea></p>
		
						<button name=\"modificarEventoActu\" value=\"".$nombre."\" ><h4><b>Guardar cambios</b></h4></button>
	
		

						</form>
					
					";
				break;
			}
			
			
			//mysql_close($conexion); 
			
			
			
		}
	?>

	
	
 
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
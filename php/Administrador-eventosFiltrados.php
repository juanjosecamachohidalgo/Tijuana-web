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

		//--Elimina un evento--
		if(isset($_POST['eliminarEvento']))
		{
			$nombreEvento = @$_POST['eliminarEvento'];		
	
			$sSQL="Delete From evento Where nombreEvento='".$nombreEvento."'";
			$conexion = mysql_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila");
			mysql_select_db("mydb", $conexion);		
			mysql_query($sSQL,$conexion) or die ("Error de servidor");
			mysql_close($conexion); 
			
			
		}
		
		
		
		//--Lista los articulos en la pantalla--
		//--Parametro: recibe una cadena con la consulta para mostrar los articulos--
		function mostrar($consulta){	
			$conexion = mysql_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila");
			mysql_select_db("mydb", $conexion);	


			$pagina=new PHPPaging;
			$pagina->agregarConsulta($consulta);
			$pagina->ejecutar();
			$boolMsg=true;
			while($array_res=$pagina->fetchResultado())
			{	
				$boolMsg=false;
				
				$nombre=$array_res['nombreEvento'];
				$descripcion=$array_res['descripcionBreveEvento'];
				$imagen=$array_res['imagenEvento'];
				$fecha=$array_res['fechaEvento'];


				//--Codigo HTML de evento-

				
				$producto="	<form action=\"Administrador-eventoCompleto.php\" method=\"post\" id=\"".$nombre."\" name=\"evento\" value=\"".$nombre."\" >
							<div><fieldset align=\"left\" class=\"rating\" style=\"margin-top: 20px; margin-bottom:50px; width:70%;\">
							
							<div>
							
								<input type=\"image\" style=\"border-style: solid; border-width: 1px; float:left; width:250px; height:250px; margin-right:3%;\" id=\"calimocho\" src=\"".$imagen."\"/>
							
								<div  id=\"descripcion\">
			
									<a  style=\"color:black;\"href=\"javascript:doSubmit('".$nombre."')\"><h3><b>".$nombre."</b></h3></a>
									<input type=\"hidden\" name=\"evento\" value=\"".$nombre."\">
									<div>".$fecha."</div>
									</br>
									<div>
									
										<p>".$descripcion."</p>	
									</div>
								</div>
							</div>
							</form>
							
							
							
						</fieldset>
						<div style=\"margin-bottom:0%; \" align=\"right\">
								<form method=\"post\">
									<button  style=\"width:150px;\" name=\"eliminarEvento\" value=\"".$nombre."\">
									<b>Eliminar evento</b>
									</button>
								</form>
								<form action=\"Administrador-modificarEvento.php\" method=\"post\">
									<button style=\"width:150px;\" name=\"modificarEvento\" value=\"".$nombre."\">
									<b>Modificar evento</b>
									</button>
								</form>

								
							</div>
						</div>";

			//--Muestro un producto--
			echo $producto;
			}
			if($boolMsg==true)
			{
				echo "<b>No existe ninguna coincidencia</b></br>";
			}
			else
			{
				echo 'Paginas '.$pagina->fetchNavegacion();
			}
			mysql_close($conexion); 
		}	

		if(isset($_POST['buscar']))
		{	
			$consulta = "select * from evento where nombreEvento like '%";//.$sort;
			$filtro = $_POST['busquedaEvento'];
			$consulta=$consulta.$filtro."%'";
			setcookie("consultaFiltro",$consulta,time()+86400);
			//mostrar($consulta);
			
		}
		else if(isset($_COOKIE['consultaFiltro']))
		{
			$consulta = $_COOKIE['consultaFiltro'];
		}
		
		//echo $consulta;
		mostrar($consulta);
		?>

		</div>




		
 </section>
 <script type="text/javascript">
function doSubmit(nombre)
{
	 document.getElementById(nombre).submit(); 
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
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
<script src="js/menu.js" type="text/javascript"></script>
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

@session_start();
if(isset($_SESSION['username'])){
	unset ($_SESSION['username']);
	session_destroy();
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
 
  <li><a class="active" href="../index.php"><i class="fa fa-fw fa-home"></i>Inicio</a></li>
  <li><a href="galeria.php"><i class="fa fa-fw fa-camera"></i>Galería</a></li>
  <li><a href="eventos.php"><i class="fa fa-fw fa-angellist"></i>Eventos</a></li>
  <li><a href="productos.php"><i class="fa fa-fw fa-coffee"></i>Productos</a></li>
  <li><a href="contacto.php"><i class="fa fa-fw fa-phone-square"></i>Contacto</a></li>
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
	  <li style="padding-top: 12px; margin-bottom: -20px; margin-left: 15px;">
	  <form name="sort" action="eventosOrdenados.php" method="post">
		<select name="order">
			<option>-</option>
			<option value="order by fechaEvento ASC">Fecha ascendente</option>
			<option value="order by fechaEvento DESC">Fecha descendente</option>
		</select>
		<button name="ordenar" style="color: grease;">Ordenar</button>
	   </form>
	   </li>
	   <li style="padding-top: 12px; padding-bottom: 0px; margin-left: -10px;">
	   <form action="eventosFiltrados.php" name="busqueda" method="post">
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
<?php header('Content-Type: text/html; charset=UTF-8');
	
	if(isset($_POST['evento']))
	{
		
		$nombreEvento = @$_POST['evento'];		
			

			
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
					
					 <form action=\"modificarEvento.php\" method=\"POST\">
						<div align=\"center\">
						
							<h3><b>".$nombre."</b></h3>
							
							
							</div>
							<div>
							<img style=\"border-style: solid; border-width: 1px; width:500px; height:300px; margin-bottom:1%;\" id=\"imgEvento\" src=\"".$imagen."\"/>
						</div>
						
						<div align=\"center\">
								".$fecha."
						</div>
						</br>	
						<div>
							".$descComp."
						</div>

		

					</form>
					
					";
			
			}
			
		
			
			
		}
	?>

	
	
 
</div>






		

		
 </section>
 
 <script type="text/javascript">
function doSubmit(nombre)
{
	 document.getElementById(nombre).submit(); 
}
</script>
 <script type="text/javascript">
function controlcookies() {
	var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = "aceptaCookies" + "=" + "aceptaCookies" + ";" + expires + ";path=/";
    cookie1.style.display='none';
}
</script>
<?php 

if(!isset($_COOKIE['aceptaCookies']))
{
	echo "<div  align=\"left\" class=\"cookiesms\" id=\"cookie1\">
	Esta web utiliza cookies, puedes ver nuestra  
	<a href=\"politica-cookies.php\">la politica de cookies, aqui</a> 
	Si continuas navegando estas aceptandola
	<button style=\"color: white; background-color:black;\" onclick=\"controlcookies()\">Aceptar</button>
	</div>";	
}
?>
<style type="text/css">
.cookiesms{	
z-index=300;
	width:100%;
	height15%;
	margin:0 auto;
	
	padding-bottom:5%;
	padding-left:1%;
        padding-top:5px;
        font-size: 1.5em;
	clear:both;
        font-weight: strong;
color: white;
bottom:0px;
position:fixed;
left: 0px;
background-color: black;
opacity:0.85;
filter:alpha(opacity=70); /* For IE8 and earlier */
transition: bottom 1s;
-webkit-transition:bottom 1s; /* Safari */
-webkit-box-shadow: 3px -3px 1px rgba(50, 50, 50, 0.56);
-moz-box-shadow:    3px -3px 1px rgba(50, 50, 50, 0.56);
box-shadow:         3px -3px 1px rgba(50, 50, 50, 0.56);
z-index:999999999;
}
</style>
 
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
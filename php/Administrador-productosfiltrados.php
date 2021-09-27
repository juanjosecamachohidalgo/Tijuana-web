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

<body class="body">

<!--Cabecera-->
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
<div id="header2"style="z-index:50;margin-top:0;"> </div>

<!--	----------------------	 -->
<div align="center">
<nav id="cssmenu" style="z-index:1; margin-top:0%;">
  <ul>
      <li style="margin-bottom: -20px;">
	  <a href="Administrador-newProducto.php" target="_blank"> + Añadir producto</a>
	  </li>
	  <li style="padding-top: 12px; margin-bottom: -20px; margin-left: 15px;">
	  <form name="sort" action="Administrador-productosOrdenados.php" method="post">
		<select name="order">
			<option>-</option>
			<option value="order by precioProducto ASC">Precio ascendente</option>
			<option value="order by precioProducto DESC">Precio descendente</option>
			<option value="order by valoracionProducto DESC">Valoración</option>
		</select>
		<button name="ordenar" style="color: grease;">Ordenar</button>
	   </form>
	   </li>
	   <li style="padding-top: 12px; padding-bottom: 0px; margin-left: -10px;">
	   <form action="Administrador-productosFiltrados.php" name="busqueda" method="post">
		<input type="text" style="width: 50%;" name="busquedaProducto" id="BusquedaProducto">
		<button name="buscar"><li>Buscar</li></button>
	   </form>
	   </li>
	</ul>
  </nav>
  </div>
</header>
</br>

 <!-- Contacto -->
 <section class="contenedorContacto" align="center">


<div align="center" class="contenedorProductos">
		<?php
		
		
		//--Elimina un articulo--
		if(isset($_POST['eliminarProducto']))
		{
			$nombreProducto = @$_POST['eliminarProducto'];		
	
			$sSQL="Delete From producto Where nombreProducto='".$nombreProducto."'";
			$conexion = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila", "mydb");
			//mysql_select_db("mydb", $conexion);		
			mysqli_query($conexion, $sSQL) or die ("Error de servidor");
			//mysql_close($conexion); 		
		}
		
		else if (isset($_POST['like']))
		{
			$producto=$_POST['like'];
			$consulta = "select * from producto where nombreProducto='".$producto."'";
			$conexion = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila", "mydb");
			//mysql_select_db("mydb", $conexion);		
			$resultados=mysqli_query($conexion, $consulta) or die ("Error de servidor");
			while($array_res=mysqli_fetch_array($resultados)){ 
				$likes=((int)$array_res['likes'])+1;
				$dislikes=((int)$array_res['dislikes']);	
				$media=$likes-$dislikes;
				$consulta="UPDATE producto SET likes=".$likes.", valoracionProducto=".$media." WHERE nombreProducto='".$producto."'";
				mysqli_query($conexion, $consulta) or die ("Error de servidor");	
			}
			//echo $producto;
			//--Cookie para que no pueda volver a valorar--
			$prod2=str_replace(" ","_",$producto);
			setcookie($prod2."","like",time()+(86400*7));
			//mysqli_free_result($resultados); 
			//mysql_close($conexion);
			header("Refresh:0");	
		}
		else if (isset($_POST['dislike']))
		{
			$producto=$_POST['dislike'];
			$consulta = "select * from producto where nombreProducto='".$producto."'";
			$conexion = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila", "mydb");
			//mysql_select_db("mydb", $conexion);		
			$resultados=mysqli_query($conexion, $consulta) or die ("Error de servidor");
			while($array_res=mysqli_fetch_array($resultados)){ 
				$dislikes=((int)$array_res['dislikes'])+1;
				$likes=((int)$array_res['likes']);
				$media=$likes-$dislikes;
				$consulta="UPDATE producto SET dislikes=".$dislikes.", valoracionProducto=".$media." WHERE nombreProducto='".$producto."'";
				mysqli_query($conexion, $consulta) or die ("Error de servidor");
			}
			//--Cookie para que no pueda volver a valorar--
			$prod2=str_replace(" ","_",$producto);
			setcookie($prod2,"dislike",time()+(86400*7));
			//mysql_free_result($resultados); 
			//mysql_close($conexion); 
			//--Refresca para desactivar el boton--
			header("Refresh:0");
		}
		
		//--Lista los articulos en la pantalla--
		//--Parametro: recibe una cadena con la consulta para mostrar los articulos--
		function mostrar($consulta){	
			//$conexion = mysqli_connect("www.antiguoreino.com" , "tijuana" , "tequila", "mydb");
			//mysql_select_db("mydb", $conexion);	


			$pagina=new PHPPaging;
			$pagina->agregarConsulta($consulta);
			$pagina->ejecutar();
			$boolMsg=true;
			while($array_res=$pagina->fetchResultado())
			{
				$boolMsg=false;
				$nombre=$array_res['nombreProducto'];
				$descripcion=$array_res['descripcionProducto'];
				$precio=$array_res['precioProducto'];
				$imagen=$array_res['imagenProducto'];
				$valor=$array_res['valoracionProducto'];
				$likes=$array_res['likes'];
				$dislikes=$array_res['dislikes'];
				
				//--Codigo HTML de producto--
				$prod2=str_replace(" ","_",$nombre);
				if(!isset($_COOKIE[$prod2]))
				{
					$valProdMostrar="</br>
									<p style\"color:black;\">Valoración</p>
									<form style=\"margin-bottom:0px;\"method=\"post\">
									<input style=\"border-style: outset;\"id=\"1btnL".$nombre."\"  name=\"dislike\" value=\"$nombre\"  type=image src=\"img/dislike2.jpg\" width=\"35\" height=\"35\">
									<input style=\"border-style: outset;\" id=\"2btnL".$nombre."\"  name=\"like\" value=\"$nombre\" type=image src=\"img/like.jpg\" width=\"35\" height=\"35\">
									</form>
									<a>(".$dislikes." negativos/".$likes." positivos)</a>";
				}
				else
				{
					$valProdMostrar="</br>
									<p style\"color:black;\">Valoración</p>
									<form>
									<input type=image src=\"img/dislike2.jpg\" width=\"35\" height=\"35\" disabled style=\"border-style: inset; opacity: 0.3; filter: alpha(opacity=50);\">
									<input type=image src=\"img/like.jpg\" width=\"35\" height=\"35\" disabled style=\"border-style: inset; opacity: 0.3; filter: alpha(opacity=50);\">
									</form>
									<p style=\"margin-bottom:20px;\"><a>(".$dislikes." negativos/".$likes." positivos)</a></p>";
				}
				

				
				$producto="	<div><fieldset align=\"left\" class=\"rating\" style=\"margin-top: 20px; margin-bottom:50px; width:70%;\">
							<legend id=\"leyenda\" name=\"leyenda\"><b style=\"font-size: x-large;\">".$nombre."</b>:</legend>
							<div>
								<img style=\"border-style: solid; border-width: 1px; float:left; width:200px; height:200px;\" id=\"calimocho\" src=\"".$imagen."\"/>
								<div style=\"padding-left:30%;\" id=\"descripcion\">
									<b>Descripcion:</b>
									<p>".$descripcion."</p>
								</div>
							</div>
							</br>	
							</br>	
							</br>
							</br>
							<div  style=\"padding-left:30%;\"id=\"divPrecioValoracion\">
								<div style=\"color:red;\" id=\"divPrecio\">
									<b>".$precio."€</b>
								</div>";			
				$producto=$producto.$valProdMostrar.
						   "</div>	
						   <div style=\"margin-top:-0px; \" align=\"right\">
								<form method=\"post\">
									<button  style=\"width:150px;\" name=\"eliminarProducto\" value=\"".$nombre."\">
									<b>Eliminar producto</b>
									</button>
								</form>
								<form action=\"Administrador-modificarProducto.php\" method=\"post\">
									<button style=\"width:150px;\" name=\"modificarProducto\" value=\"".$nombre."\">
									<b>Modificar producto</b>
									</button>
								</form>
							</div>
						</fieldset></div>";

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
			//mysql_close($conexion); 
		}
		if(isset($_POST['buscar']))
		{	
			$consulta = "select * from producto where nombreProducto like '%";//.$sort;
			$filtro = $_POST['busquedaProducto'];
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
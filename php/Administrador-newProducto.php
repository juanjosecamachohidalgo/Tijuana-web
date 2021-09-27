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
</header>


 



 <!-- Contacto -->
 <section class="contenedorContacto" align="center">
 
	<div align="center" class="contenedorProductos">	
		<?php
	 
//include 'newProducto.php';

	if(isset($_POST['up'])){
		//alert("HOLAA");
		$servername = "localhost";
		$username = "tijuana";
		$password = "tequila";
		$dbname = "mydb";
		$conn = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila", "mydb");
		//mysql_select_db("mydb", $conn);
		
		
		//if ($conn->connect_error) {
		//	die("Connection failed: " . $conn->connect_error);
		//} 

		$producto=utf8_decode($_POST['producto']);// document.getElementById('Producto').value;
		$descripcion=utf8_decode($_POST['descripcion']);//document.getElementById('Descripcion').value;
		$precio=utf8_decode($_POST['precio']);//document.getElementById('00.00').value;
		$imagen=utf8_decode($_POST['imagen']);//document.getElementById('URL Imagen').value;
		
		$boolSubir=true;
		
		if($producto=="Producto"||$producto=="")
		{
			$boolSubir=false;
			echo "<font size=\"5\" color=\"red\">Error, nombre vacio</font>";	
			echo "</br>";
		}
		if($descripcion=="Descripcion"||$descripcion=="")
		{
			$boolSubir=false;
			echo "<font size=\"5\" color=\"red\">Error, descripción vacia</font>";	
			echo "</br>";
		}
		if($precio=="00.00"||$precio=="")
		{
			$boolSubir=false;
			echo "<font size=\"5\" color=\"red\">Error, precio vacio</font>";	
			echo "</br>";
		}
		if($imagen=="URL Imagen"||$imagen=="")
		{
			$boolSubir=false;
			echo "<font size=\"5\" color=\"red\">Error, imagen vacia</font>";	
			echo "</br>";
		}
		
		if($boolSubir==true){
			$sql="select nombreProducto from producto where nombreProducto='".$producto."'";
			$total = mysqli_num_rows(mysqli_query($conn ,$sql));
			if($total==0){
				//echo 'No hay usuarios';
				$sql = "INSERT INTO producto (nombreProducto, descripcionProducto, imagenProducto, precioProducto)
				VALUES ('".$producto."','".$descripcion."','".$imagen."','".$precio."')";
				mysqli_query($conn, $sql);
				echo "<font size=\"5\" color=\"green\">	Producto subido</font>";
			}
			else
			{
			//	echo 'Hay un total de '.$total.' usuarios';
				echo "<font size=\"5\" color=\"red\">	Este producto ya existe</font>";
			}
			
			
			//mysql_close($conn);
		}
		}
	
?>

	
	<form action="Administrador-newProducto.php" method="POST">
	<fieldset align="left" class="rating" style="width:70%;">
	<legend id="leyenda" name="leyenda"><b style="font-size: x-large;">Nuevo producto</b>:</legend>
	<div>
		<img style="border-style: solid; border-width: 1px; float:left; width:200px; height:200px; margin-right:1%; margin-bottom:2%;" id="imgProducto" src=""/>
		<div  style="padding-left:0%;"id="descripcion">
			<b><textarea style=" margin-bottom:1%;" name="producto" id="Producto" onclick="borrarTexto(this.id)" class="textoSugerencia" rows="1" cols="39">Producto</textarea></b>
			<p><textarea name="descripcion" id="Descripcion" onclick="borrarTexto(this.id)" class="textoSugerencia" rows="5" cols="45">Descripcion</textarea></p>
			<b>Precio:</b>
			<p><textarea name="precio" id="00.00" onclick="borrarTexto(this.id)" class="textoSugerencia" rows="1" cols="4">00.00</textarea></p>
		</div>
		</br>
	</div>
		
		<div align="left" id="divBotonImagen">
		<div>
		<input type="text" name="imagen" id="URL Imagen" value="URL Imagen" onclick="borrarTexto(this.id)">
		<button style="margin-right:23%;" type="button" id="botonSubir" id="botonImagen" onclick="mostrarImg()" >Mostrar</button>
		</div>
		</br>
		<div style=""align="right">
			<button id="botonSubir" name="up">
				<b>Subir producto</b>
			</button>
		</div>
		</div>
		
	</fieldset>
	</form>
 
</div>



		
 </section>
 
 <script>
 function mostrarImg(){
	 //alert("hola");
	var img=document.getElementById("URL Imagen").value;
   // alert(img+"");
	document.getElementById("imgProducto").src=img;
 }
 function borrarTexto(id){
	 var texto=document.getElementById(id).value;
	 if(texto==id){
		 document.getElementById(id).value="";
	 }
	 
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
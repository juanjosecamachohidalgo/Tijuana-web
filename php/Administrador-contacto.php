<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />


<title>Tijuana Tequila</title>
</head>
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


<!--Tipos de letra-->
<link href="https://fonts.googleapis.com/css?family=Comfortaa|Kaushan+Script" rel="stylesheet">

<!--Css principal-->
<link href="../css/contacto.css" rel="stylesheet" type="text/css">
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
                                          
</header> 
<!--FinCabecera-------------------------------------------------------------------------------->


 



 <!-- Contacto -->
 <div class="contenedorContacto">
	

   <div  class ="contenidoContacto">
		<div align="center">
			<b class="letraFuerte">Contacto</b>
			<div align="left">
				<p><b class="letraMediana">Teléfono:</b> <br/>653947642</p>
				<p><b class="letraMediana">Correo:</b> <br/>juanmatijuana@gmail.com</p>
				<p><b class="letraMediana">Horario apertura:</b> <br/>Lunes a Sabado - 16:00/3:00<br/>Domingo - 16:00/22:00</p>
				<b class="letraMediana">Sugerencias:</b>
				</br>
				<a href="Administrador-sugerencias.php"><h3>Ver sugerencias</h3></a>
				<a href="ver-usuario.php"><h3>Ver usuarios</h3></a>
				<a href="crear-usuario.php"><h3>Crear usuario</h3></a>
			    </div>

			
            </div>
		</div>
	</div>


		
		
		
		
		

 </div>
  <?php       
if(isset($_POST['email'])) {
	$nombre = $_POST['Nombre'];
	$sourceEmail = $_POST['sourceEmail'];
	$mensaje = $_POST['Comentarios'];
	
	if (filter_var($sourceEmail, FILTER_VALIDATE_EMAIL)) {
		$conexion = mysql_connect("localhost" , "root" , "");
		mysql_select_db("mydb", $conexion);
		$insert = "INSERT INTO sugerencia (nombreSugerencia, mensajeSugerencia, emailSugerencia) VALUES (\"$nombre\", \"$mensaje\", \"$sourceEmail\");";
		mysql_query($insert,$conexion) or die("Error de servidor");
		mysql_close($conexion);
	}else 
		echo "Error - Ha introducido un email incorrecto";
	
}


/*$nombre = $_POST['Nombre'];
 $sourceEmail = $_POST['sourceEmail'];
 $mensaje = $_POST['Comentarios'];

 $destino = "zeyndos@gmail.com";
 $asunto = "[Sugerencia] ".$nombre;
 $cabecera = "From: $sourceEmail <$sourceEmail>\r\n";

 $enviado = mail($destino, $asunto, $mensaje, $cabecera);

 if(!$enviado)
 	echo "Error - No se ha podido enviar el mensaje.";
 	else
 		echo "Sugerencia tramitada con exito!";
 		*/

/*
// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "zeyndos@gmail.com";
$email_subject = "Contacto desde el sitio web";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['Nombre']) ||
!isset($_POST['Email']) ||
!isset($_POST['Comentarios'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['Nombre'] . "\n";
$email_message .= "E-mail: " . $_POST['Email'] . "\n";
$email_message .= "Comentarios: " . $_POST['Comentarios'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
$estado= mail($email_to, $email_subject, $email_message, $headers);

if($estado) 
   echo "¡El formulario se ha enviado con éxito!";
   else
   echo "El formulario no ha sido enviado";
}
*/
?>
<!--//BLOQUE COOKIES-->
<div id="barraaceptacion" style="display: block;">
    <div class="inner">
        Solicitamos su permiso para obtener datos estadísticos de su navegación en esta web, en cumplimiento del Real 
        Decreto-ley 13/2012. Si continúa navegando consideramos que acepta el uso de cookies.
        <a href="javascript:void(0);" class="ok" onclick="PonerCookie();"><b>OK</b></a> | 
        <a href="http://politicadecookies.com" target="_blank" class="info">Más información</a>
    </div>
</div>
 
<script>
function getCookie(c_name){
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1){
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1){
        c_value = null;
    }else{
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1){
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}
 
function setCookie(c_name,value,exdays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}
 
if(getCookie('tiendaaviso')!="1"){
    document.getElementById("barraaceptacion").style.display="block";
}
function PonerCookie(){
    setCookie('tiendaaviso','1',365);
    document.getElementById("barraaceptacion").style.display="none";
}
</script>
<!--//FIN BLOQUE COOKIES-->
<!--pie-------------------------------------------------------------------------------------------->
 
 <footer class="footer">
	<div>
		<font color="#FFFFFF">Tijuana Tequila Hostelería S.L. CIF B-04759411. Calle Álvarez de Castro nº2, 04001, Almería.</font>                
		
     </div>	
	 <div>
		<!--<font color="#FFFFFF">  
		     <i class="fa fa-facebook" aria-hidden="true"></i>	
             <i class="fa fa-instagram" aria-hidden="true"></i>  
        </font>			 -->
		
     </div>	
 </footer> 
</body>
</html>
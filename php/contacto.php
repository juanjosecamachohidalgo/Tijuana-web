<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />


<title>Tijuana Tequila</title>
</head>

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
   <script src="../js/script.js"></script>
             <!-- Menú- Icon Library -->

<!---->


           

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
                                          
</header> 
<!--FinCabecera-------------------------------------------------------------------------------->

 



 <!-- Contacto -->
 <div class="contenedorContacto">
	

   <div class="contactoContainer">
		<div align="center">
			<b class="letraFuerte">Contacto</b>
			<div align="left">
				<p><b class="letraMediana">Teléfono:</b> <br/>653947642</p>
				<p><b class="letraMediana">Correo:</b> <br/>juanmatijuana@gmail.com</p>
				<p><b class="letraMediana">Horario apertura:</b> <br/>Lunes a Sabado - 16:00/3:00<br/>Domingo - 16:00/22:00</p>
				<b class="letraMediana">Sugerencias:</b>
				</br>
				
				<form method="post">
				<textarea name="Nombre" class="textoSugerencia" rows="1">Nombre</textarea>
				</br>
				<textarea name="sourceEmail" class="textoSugerencia" rows="1">E-Mail</textarea>
				</br>
				<textarea name="Comentarios" class="textoSugerencia" rows="10">Escribe aquí tus comentarios</textarea>
				<div id="boton" align="right">
				      <button name="email" value="Enviar" id="btnSugerencia">Enviar</button>
				      </form>
				      </br>
				      </br>
			    </div>

			
            </div>
		</div>
	</div>


		<!-- Localizacion -->
		<div align="center" class="contenidoContacto">
			<b class="letraFuerte">Localización</b>
			<div align="center">		
				<iframe id="mapa" src="https://www.google.com/maps/d/embed?mid=1VARCvTyQo72FryUUo_QtBIpB7Eo" width="640" height="480"></iframe>
				</br>
				<small align="right" class="letraMediana">Calle Alvarez de Castro Nº2</small>
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

<!doctype html>
<html>

<?php

@session_start();
if(isset($_SESSION['username'])){
	unset ($_SESSION['username']);
	session_destroy();
	}
	?>

<head>
  <title>Tijuana Tequila</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--Css principal-->
<link href="css/main.css" rel="stylesheet" type="text/css">
<!----->

<!--Menú-->
             <!--Menú-Plugin-->
<script src="js/menu.js" type="text/javascript"></script>
             <!-- Menú- Icon Library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  
</head>
<body class="body">

<!--FacebookRoot-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!--Cabecera---------------------------------------------------------------------------------------->
<header class="header">
                      
<!--Logo-->
<div class="headerContainer">
<div class="containerLogo"><img class="logo" src="images/logo.jpg"></div>




                    <!--Menu-->
<div class="menuContainer">
<ul class="topnav" id="myTopnav">
 
  <li><a class="active" href="index.php"><i class="fa fa-fw fa-home"></i>Inicio</a></li>
  <li><a href="php/galeria.php"><i class="fa fa-fw fa-camera"></i>Galería</a></li>
  <li><a href="php/eventos.php"><i class="fa fa-fw fa-angellist"></i>Eventos</a></li>
  <li><a href="php/productos.php"><i class="fa fa-fw fa-coffee"></i>Productos</a></li>
  <li><a href="php/contacto.php"><i class="fa fa-fw fa-phone-square"></i>Contacto</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:20px;" onclick="myFunction()">☰</a>
  </li>
</ul></div>



</div>
<div class="lineaBlanca"></div>
                                          
</header> 
<!--FinCabecera-------------------------------------------------------------------------------->


<!--SeccionContenidos-------------------------------------------------------------------------->
<div class="contenido"> 

  <div class="izquierda">  
    <div class="eventos">
          <img id="proximoEvento" src="images/proximoEvento.png">
		  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftijuanatequila&tabs=timeline%2C%20events&width=300&height=380&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId&colorscheme=dark" width="300" height="380" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
           
	</div>
  </div>
  <div class="centro"><img id="imagenWelcome" src="images/tijuana.png" /></a>
<br /><!--<img src="images/tijuana.png" align="center">--></div>
  
  <div class="servicios">
     <div class="servicio"><img id="imagenServicio" src="images/futbolinlight.jpg">Futbolín</div>
	 <div class="servicio"><img id="imagenServicio" src="images/billarlight.jpg">Billar</div>
	 <div class="servicio"><img id="imagenServicio" src="images/dardoslight.jpg">Dardos</div>

  
  </div>
  <div class="sugerenciasMusicales">
          <div class="contenidoMusical">   <form method="post"><b style="color:aliceblue">¿Qué música quieres escuchar en nuestro local? Escribe nombre y canción. </b>
			  <textarea name="Musica" class="textoSugerencia" rows="1"></textarea>
				<button name="email" value="Enviar" id="btnSugerencia">Enviar</button>
		     </form>
		     </div>
		  </div>
  </div>
<?php       
if(isset($_POST['email'])) {
	$Musica = $_POST['Musica'];
	
		$conexion = mysql_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila");
		mysql_select_db("mydb", $conexion);
		$insert = "INSERT INTO sugerencia (nombreSugerencia, mensajeSugerencia, emailSugerencia) VALUES (\"Música\", \"$Musica\", \"Anónimo\");";
		mysql_query($insert,$conexion) or die("Error. No ha podido enviarse la sugerencia.");
		mysql_close($conexion);
	    echo "Se ha enviado la sugerencia correctamente";
	
	} 
	

?>


<!--FinSeccionContenidos--------------------------------------------------------------------------->



<!--pie-------------------------------------------------------------------------------------------->
 
 <footer class="footer">
	<div>
		<font color="#FFFFFF">Tijuana Tequila Hostelería S.L. CIF B-04759411. Calle Álvarez de Castro nº2, 04001, Almería. <a href="php/avisolegal.php">Aviso Legal.</a></font>                
		
     </div>	
	 <div align="center" margin-top="2%">   <script type="text/javascript" src="https://counter1.fcs.ovh/private/countertab.js?c=5670dea11425b29000941d160812aecc"></script>	
		<!--<font color="#FFFFFF">  
		     <i class="fa fa-facebook" aria-hidden="true"></i>	
             <i class="fa fa-instagram" aria-hidden="true"></i>  
        </font>			 -->
		
     </div>	
 </footer>

<!--Cookies--------------------------------------------------------------------------------------------------------------------------->
<!--//BLOQUE COOKIES-->
<div id="barraaceptacion" style="display: block;">
    <div class="inner">
        Solicitamos su permiso para obtener datos estadísticos de su navegación en esta web, en cumplimiento del Real 
        Decreto-ley 13/2012. Si continúa navegando consideramos que acepta el uso de cookies.
        <a href="javascript:void(0);" class="ok" onclick="PonerCookie();">OK</a> | 
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
</body>

</html>


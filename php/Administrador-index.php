
<!doctype html>

<html>
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


<head>
  <title>Tijuana Tequila</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--Css principal-->
<link href="../css/main.css" rel="stylesheet" type="text/css">
<!----->

<!--Menú-->
             <!--Menú-Plugin-->
<script src="../js/menu.js" type="text/javascript"></script>
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


<!--SeccionContenidos-------------------------------------------------------------------------->
<div class="contenido"> 

  <div class="izquierda">  
    <div class="eventos">
          <img id="proximoEvento" src="../images/proximoEvento.png">
		  <!--<div class="fb-page" data-href="https://www.facebook.com/tijuanatequila" data-height="380" data-tabs="events, timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/tijuanatequila" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/tijuanatequila">Tijuana tequila</a></blockquote></div>-->
          
		  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftijuanatequila&tabs=events%2C%20timeline&width=300&height=380&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId&colorscheme=dark" width="300" height="380" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
           
	</div>
   </div>
  <div class="centro"></div>
  
  <div class="servicios">
     <div class="servicio"><img id="imagenServicio" src="../images/futbolin.jpg">Futbolín</div>
	 <div class="servicio"><img id="imagenServicio" src="../images/billar.jpg">Billar</div>
	 <div class="servicio"><img id="imagenServicio" src="../images/dardos.jpg">Dardos</div>

  
      </div>
</div>




<!--FinSeccionContenidos--------------------------------------------------------------------------->



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


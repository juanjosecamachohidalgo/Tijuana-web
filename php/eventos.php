<?php
	require_once("../paginacion/PHPPaging.lib/PHPPaging.lib.php");
	

?>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />


<title>Tijuana Tequila</title>
</head>

<!--LetraTipo-->
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
   <script src="..js/script.js"></script>
             <!-- Menú- Icon Library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!---->



<?php header('Content-Type: text/html; charset=UTF-8');

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
                                          


</div>
<div>
</div>
<div id="header2"style="z-index:50; width:100%;"> </div>


<div align="center" style="width:100%;">
<nav id="cssmenu" style=" z-index:1; margin-top:0;">
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
<!--FinCabecera-------------------------------------------------------------------------------->

 <!-- Contacto -->
 <section class="contenedorContacto" style="margin-top:260px; " align="center">


<div align="center">
		
		<?php header('Content-Type: text/html; charset=UTF-8');

		//--Elimina un evento--
		if(isset($_POST['eliminarEvento']))
		{
			$nombreEvento = @$_POST['eliminarEvento'];		
	
			$sSQL="Delete From evento Where nombreEvento='".$nombreEvento."'";
			$conexion = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila", "mydb");
			//mysql_select_db("mydb", $conexion);		
			mysqli_query($conexion, $sSQL) or die ("Error de servidor");
			//mysql_close($conexion); 
			
			
		}
		
		
		
		//--Lista los articulos en la pantalla--
		//--Parametro: recibe una cadena con la consulta para mostrar los articulos--
		function mostrar($consulta){	
			$conexion = mysqli_connect("www.tijuanatequilaalmeria.com" , "tijuana" , "tequila", "mydb");
			//mysql_select_db("mydb", $conexion);	


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

				//--Codigo HTML de evento-

				
				$producto="	<form action=\"eventoCompleto.php\" method=\"post\" id=\"".$nombre."\" name=\"evento\" value=\"".$nombre."\" >
							<div><fieldset align=\"left\" class=\"rating\" style=\"margin-top: 20px; margin-bottom:50px; width:70%;\">
							
							<div>
							
								<input type=\"image\" style=\"border-style: solid; border-width: 1px; float:left; width:250px; height:250px; margin-right:3%;\" id=\"calimocho\" src=\"".$imagen."\"/>
							
								<div  id=\"descripcion\">
			
									<a  style=\"color:black;\"href=\"javascript:doSubmit('".$nombre."')\"><h3><b>".$nombre."</b></h3></a>
									<input type=\"hidden\" name=\"evento\" value=\"".$nombre."\">
								
									<div>
										<p>".$descripcion."</p>	
									</div>
								</div>
							</div>
							</form>
							
							
							
						</fieldset>
	
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
			//mysql_close($conexion); 
		}	

		$consulta = "select * from evento";//$_COOKIE['consultaFiltro'];
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
 
<!--pie-------------------------------------------------------------------------------------------->
 
 <footer class="footer">
	<div>
		<font color="#FFFFFF">Tijuana Tequila Hostelería S.L. CIF B-04759411. Calle Álvarez de Castro nº2, 04001, Almería. <a href="php/avisolegal.php">Aviso Legal.</a></font>         
     	
		
     </div>	
	 	
		<!--<font color="#FFFFFF">  
		     <i class="fa fa-facebook" aria-hidden="true"></i>	
             <i class="fa fa-instagram" aria-hidden="true"></i>  
        </font>			 -->
		
     </div>	
 </footer>
 
</body>
</html>
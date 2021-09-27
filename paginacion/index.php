<html>
<head>
<body>
<?php
require_once("PHPPaging.lib/PHPPaging.lib.php");
require_once("conexion/conexion.php");
$pagina = new PHPPaging;
$pagina->agregarConsulta("select * from seguidores");
$pagina->ejecutar();
while($res=$pagina->fetchResultado()){
echo $res['nom_seguidor'].'<br>';
}
echo '<img src="imagenes/google.jpg"><br>';
echo 'Paginas '.$pagina->fetchNavegacion();

?>
<br><br>
<a href="ejemplo2.php">ver ejemplo 2</a>
</body>
</head>
</html>
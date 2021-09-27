<?php 

require_once("PHPPaging.lib/PHPPaging.lib.php");
require_once("conexion/conexion.php");
$pagina = new PHPPaging;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ejemplo2</title>
</head>
<body>
<center>
<table width="500" border="1">
  <tr bgcolor="skyblue">
    <td colspan="3" align="center"><strong>PAGINACION DE UNA TABLA</strong></td>
  </tr>
  <tr bgcolor="red">
    <td align="center"><strong>CODIGO</strong></td>
    <td align="center"><strong>NOMBRE</strong></td>
    <td align="center"><strong>APELLIDO</strong></td>
  </tr>
<?php
$pagina->agregarConsulta("select * from seguidores");
$pagina->ejecutar();
while($res=$pagina->fetchResultado()){
	$codigo=$res["cod_seguidor"];
	$nombre=$res["nom_seguidor"];
	$apellido=$res["ape_seguidor"];
?>  
<tr>
<td><?php echo $codigo; ?></td>
<td><?php echo $nombre; ?></td>
<td><?php echo $apellido; ?></td>
</tr>
<?php
}
?>
</table>
<?php echo 'Paginas '.$pagina->fetchNavegacion(); ?>
</center>
</body>
</html>
<?php
// Esto nos sirve para incluir Zend de forma directa
set_include_path(get_include_path() .
PATH_SEPARATOR .
realpath(dirname(__FILE__) . "/../service/application/"));
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Cliente Web Convertir Mayuscula</title>
</head>
<body>
<?php
if ( isset($_GET['palabra'])) {
$_GET['palabra'] = str_replace(" ", "", $_GET['palabra']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/service/application/servicio_ejemplo/servicio_convierte_mayusculaSOA.php?WSDL";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['palabra'] != "") ) {
?>
<h1>Tu Palabra Convertida</h1>
<p>La palabra en mayúscula es : <?php echo $cliente->convertMayuscula($_GET['palabra']); ?></p></br>
<?php 
}
}
?>
<h1>Convertidor de palabra de minúscula a mayúscula</h1>
<form action="cliente_ws_mayuscula.php" method="get">
<p>Ingrese palabra a convertir:</p>
<p><input type="text" name="palabra" /></p>
<p><input type="submit" value="Convertir" /></p>
</form>
</body>
</html>
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
<title>Cliente Web Validador de Correo</title>
</head>
<body>
<?php
if ( isset($_GET['rut'])) {
$_GET['rut'] = str_replace(" ", "", $_GET['rut']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/service/application/servicio_ejemplo/servicio_verificador_rutSOA.php?WSDL";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['rut'] != "") ) {


if ($cliente->RutValidate($_GET['rut'])){
	echo "tu rut es correcto";
}
else{
	echo "Tu Rut es incorrecto";
}

}
}
?>
<h1>Validador de Rut</h1>
<form action="cliente_ws_rut.php" method="get">
<p>Ingrese Rut a Validar:</p>
<p><input type="text" name="rut" placeholder="EJ: 12345678-9"/></p>
<p><input type="submit" value="Validar" /></p>
</form>
</body>
</html>
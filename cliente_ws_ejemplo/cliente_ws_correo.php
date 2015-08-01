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
if ( isset($_GET['correo'])) {
$_GET['correo'] = str_replace(" ", "", $_GET['correo']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/service/application/servicio_ejemplo/servicio_verificador_correoSOA.php?WSDL";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['correo'] != "") ) {


if ($cliente->RutValidate($_GET['correo'])){
	echo "tu correo es correcto";
}
else{
	echo "correo incorrecto";
}

}
}
?>
<h1>Validador de correos electrónicos</h1>
<form action="cliente_ws_correo.php" method="get">
<p>Ingrese correo electrónico:</p>
<p><input type="text" name="correo" placeholder="example@example.com"/></p>
<p><input type="submit" value="verificar" /></p>
</form>
</body>
</html>
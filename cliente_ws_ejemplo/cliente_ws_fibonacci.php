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
<title>Cliente Web Factorial</title>
</head>
<body>
<?php
if ( isset($_GET['numero'])) {
$_GET['numero'] = str_replace(" ", "", $_GET['numero']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/service/application/servicio_ejemplo/fibonacci_servicioSoa.php?wsdl";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['numero'] != "") ) {

?>
<h2> Resultado </h2> <p><?php echo $cliente->Calcularfibonacci($_GET['numero']) ?></p>
	
<?php

}
}
?>
<h1>Calcula la serie fibonacci de N terinos </h1>
<form action="cliente_ws_fibonacci.php" method="get">
<p>Ingrese número a calcular:</p>
<p><input type="text" name="numero" /></p>
<p><input type="submit" value="calcular" /></p>
</form>
</body>
</html>
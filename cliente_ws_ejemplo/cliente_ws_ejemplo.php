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
<title>Cliente de Ejemplo Servicio Web</title>
</head>
<body>

<?php
if ( isset($_GET['calcular'], $_GET['radio'])) {
$_GET['radio'] = str_replace(" ", "", $_GET['radio']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/service/application/servicio_ejemplo/servicio_ejemploSOA.php?WSDL";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['calcular'] == 'area') and ($_GET['radio'] != "") ) {
?>

<h1>Resultado AreaCirculo</h1>
<p>El area del circulo es: <?php echo $cliente->areaCirculo($_GET['radio']); ?></p><br />

<?php
}
if ( ($_GET['calcular'] == 'perimetro') and ($_GET['radio'] != "") ) {
?>

<h1>Resultado PerimetroCirculo</h1>
<p>El perimetro del circulo es: <?php echo $cliente->perimetroCirculo($_GET['radio']); ?></p><br />
<?php
}
}
?>
<h1>Prueba AreaCirculo</h1>
<form action="cliente_ws_ejemplo.php" method="get">
<input type="hidden" name="calcular" value="area" />
<p>Ingrese radio:</p>
<p><input type="text" name="radio" /></p>
<p><input type="submit" value="Calcular" /></p>
</form>
<br />
<h1>Prueba PerimetroCirculo</h1>
<form action="cliente_ws_ejemplo.php" method="get">
<input type="hidden" name="calcular" value="perimetro" />
<p>Ingrese radio:</p>
<p><input type="text" name="radio" /></p>
<p><input type="submit" value="Calcular" /></p>
</form>
</body>
</html>
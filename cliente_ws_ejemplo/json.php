<?php
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
var_dump(json_decode($json));
var_dump(json_decode($json, true));
$arreglo = array(
"persona"=> "bar",
"edad" => 42,
"correo" => array(
"primer"=> "correo1@gmail.com",
"segundo"=> "correo2@gmail.com"
)
);
echo "<hr>".json_encode($arreglo);
?>
<?php

header("Content-Type: application/json"); 
header("Acess-Control-Allow-Origin: *"); //Origen de la peticion
header("Acess-Control-Allow-Methods: POST"); //Método permitido
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization"); // Seguridad

//decode, convierte un archivo json a un array php
$data = json_decode(file_get_contents("php://input"), true); //Permite leer data del body

//Variables utilizadas para insertar un usuario
$fecha_factura = $data["fecha_factura"];
$fecha_inicio = $data["fecha_inicio"];
$fecha_fin = $data["fecha_fin"];
$cod_inmueble = $data["cod_inmueble"];
$arrendatario = $data["arrendatario"];

//Conexion a la bd
require_once "../dbconfig.php";

//Consulta SQL
$query = "INSERT INTO factura (fecha_factura, fecha_inicio, fecha_fin, cod_inmueble, arrendatario) VALUES ('$fecha_factura','$fecha_inicio','$fecha_fin',$cod_inmueble, $arrendatario)";

$result = mysqli_query($conn, $query) or die("Insert Query Failed");

if($result)
{
	echo json_encode(array("message" => "Se ha insertado la factura correctamente", "status" => true));	
}
else
{
	echo json_encode(array("message" => "Error al insertar la factura", "status" => false));	
}
?>
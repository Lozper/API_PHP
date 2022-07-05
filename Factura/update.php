<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT");
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

//Variables para actualizar un usuario
$cod_factura = $data["cod_factura"];
$fecha_factura = $data["fecha_factura"];
$fecha_inicio = $data["fecha_inicio"];
$fecha_fin = $data["fecha_fin"];
$cod_inmueble = $data["cod_inmueble"];
$arrendatario = $data["arrendatario"];

//Conexion BD
require_once "../dbconfig.php";

$query = "UPDATE factura SET fecha_factura='$fecha_factura', fecha_inicio= '$fecha_inicio', fecha_fin= '$fecha_fin', cod_inmueble= $cod_inmueble, arrendatario=$arrendatario WHERE cod_factura=$cod_factura";

$result = mysqli_query($conn, $query) or die("Update Query Failed");

if($result)
{	
	echo json_encode(array("message" => "Factura actualizada exitosamente", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Error al actualizar factura", "status" => false));	
}
?>
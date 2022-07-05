<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT");
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

//Variables para actualizar un usuario
$cod_servicio_facturado  = $data["cod_servicio_facturado"];
$cod_servicio_prestado = $data["cod_servicio_prestado"];
$cod_factura = $data["cod_factura"];
$fecha_inicio = $data["fecha_inicio"];
$cantidad_dias = $data["cantidad_dias"];

//Conexion BD
require_once "../dbconfig.php";

$query = "UPDATE servicios_facturados SET cod_servicio_prestado=$cod_servicio_prestado, cod_factura=$cod_factura,fecha_inicio='$fecha_inicio',cantidad_dias=$cantidad_dias WHERE cod_servicio_facturado=$cod_servicio_facturado";
$result = mysqli_query($conn, $query) or die("Update Query Failed");

if($result)
{	
	echo json_encode(array("message" => "Servicio facturado actualizado exitosamente", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Error al actualizar Servicio facturado", "status" => false));	
}
?>
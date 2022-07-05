<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT");
header("Acess-Control-Allow-Headers: Content-Type,Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

//Variables para actualizar un usuario
$cod_servicio_prestado = $data["cod_servicio_prestado"];
$valor_diario = $data["valor_diario"];
$cod_servicio = $data["cod_servicio"];
$prestador = $data["prestador"];

//Conexion BD
require_once "../dbconfig.php";

$query = "UPDATE servicios_prestados SET cod_servicio_prestado= $cod_servicio_prestado, valor_diario= $valor_diario, cod_servicio= $cod_servicio, prestador= $prestador WHERE cod_servicio_prestado=$cod_servicio_prestado";
$result = mysqli_query($conn, $query) or die("Update Query Failed");

if($result)
{	
	echo json_encode(array("message" => "Servicio prestado actualizado exitosamente", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Error al actualizar servicio prestado", "status" => false));	
}
?>
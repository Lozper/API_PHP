<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT");
header("Acess-Control-Allow-Headers: Content-Type,Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

//Variables para actualizar un usuario
$cod_servicio = $data["cod_servicio"];
$nombre_servicio = $data["nombre_servicio"];
$tipo_servicio = $data["tipo_servicio"];

//Conexion BD
require_once "../dbconfig.php";

$query = "UPDATE servicio SET nombre_servicio='$nombre_servicio', tipo_servicio='$tipo_servicio' WHERE cod_servicio=$cod_servicio";
$result = mysqli_query($conn, $query) or die("Update Query Failed");

if($result)
{	
	echo json_encode(array("message" => "Servicio actualizado exitosamente", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Error al actualizar Servicio", "status" => false));	
}

?>
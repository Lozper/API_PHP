<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT");
header("Acess-Control-Allow-Headers: Content-Type,Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

//Variables para actualizar un usuario
$cod_inmueble = $data["cod_inmueble"];
$tipoInmueble = $data["tipo_inmueble"];
$numHab = $data["num_habitaciones"];
$valorArriendo = $data["valor_arriendo"];
$pais = $data["pais"];
$dir = $data["direccion"];
$propietario = $data["propietario"];

//Conexion BD
require_once "../dbconfig.php";

$query = "UPDATE inmueble SET tipo_inmueble= '$tipoInmueble', num_habitaciones= '$numHab', valor_arriendo= $valorArriendo, direccion= '$dir', pais= '$pais' WHERE cod_inmueble=$cod_inmueble";
$result = mysqli_query($conn, $query) or die("Update Query Failed");

if($result)
{	
	echo json_encode(array("message" => "Inmueble actualizado exitosamente", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Error al actualizar inmueble", "status" => false));	
}

?>
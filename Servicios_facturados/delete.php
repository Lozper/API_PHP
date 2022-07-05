<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: DELETE");
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

//Variable Utilizada para eliminar un usuario
$cod_servicio_facturado  = $data["cod_servicio_facturado"];

//Conexion BD
require_once "../dbconfig.php";

//Consulta
$query = "DELETE FROM servicios_facturados WHERE cod_servicio_facturado =$cod_servicio_facturado";
$result = mysqli_query($conn, $query) or die("Delete Query Failed");

if($result)
{	
	echo json_encode(array("message" => "Servicio facturado eliminado exitosamente", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Error al eliminar el Servicio facturado", "status" => false));	
}

?>
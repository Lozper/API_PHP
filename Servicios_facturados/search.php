<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: GET");

$data = json_decode(file_get_contents("php://input"), true);

//Variable para buscar un usuario
$cod_servicio_facturado = $data["cod_servicio_facturado"];

require_once "../dbconfig.php";

$query = "SELECT * FROM servicios_facturados WHERE cod_servicio_facturado=$cod_servicio_facturado";

$result = mysqli_query($conn, $query) or die("Search Query Failed.");

$count = mysqli_num_rows($result);

if($count > 0)
{	
	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($row);
}
else
{	
	echo json_encode(array("message" => "No se encontró el servicio facturado", "status" => false));
}

?>
<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: GET");

$data = json_decode(file_get_contents("php://input"), true);

//Variable para buscar un usuario
$cod_usuario = $data["cod_usuario"];

require_once "../dbconfig.php";

$query = "SELECT * FROM inmueble WHERE propietario LIKE '%".$cod_usuario."%' ";

$result = mysqli_query($conn, $query) or die("Search Query Failed.");

$count = mysqli_num_rows($result);

if($count > 0)
{	
	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($row);
}
else
{	
	echo json_encode(array("message" => "No se encontró el inmueble", "status" => false));
}

?>
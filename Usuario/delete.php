<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Content-Type,Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

//Variable Utilizada para eliminar un usuario
$cod_usuario = $data["cod_usuario"];

//Conexion BD
require_once "../dbconfig.php";

//Consulta
$query = "DELETE FROM usuario WHERE cod_usuario=$cod_usuario";
$result = mysqli_query($conn, $query) or die("Delete Query Failed");

if($result)
{	
	echo json_encode(array("message" => "Usuario eliminado exitosamente", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Error al eliminar el Usuario", "status" => false));	
}

?>
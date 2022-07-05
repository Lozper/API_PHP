<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: DELETE");
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

//Variable Utilizada para eliminar factura
$cod_factura = $data["cod_factura"];

//Conexion BD
require_once "../dbconfig.php";

//Consulta
$query = "DELETE FROM factura WHERE cod_factura=$cod_factura";

if(mysqli_query($conn, $query) or die("Delete Query Failed"))
{	
	echo json_encode(array("message" => "Factura eliminada exitosamente", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Error al eliminar la factura", "status" => false));	
}

?>
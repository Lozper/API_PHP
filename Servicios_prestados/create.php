<?php

header("Content-Type: application/json"); 
header("Acess-Control-Allow-Origin: *"); //Origen de la peticion
header("Acess-Control-Allow-Methods: POST"); //Método permitido
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization"); // Seguridad

//decode, convierte un archivo json a un array php
$data = json_decode(file_get_contents("php://input"), true); //Permite leer data del body

//Variables utilizadas para insertar un usuario
$valor_diario = $data["valor_diario"];
$cod_servicio = $data["cod_servicio"];
$prestador = $data["prestador"];

//Conexion a la bd
require_once "../dbconfig.php";

//Consulta SQL
$query = "INSERT INTO servicios_prestados (valor_diario, cod_servicio, prestador) VALUES ($valor_diario,$cod_servicio,$prestador)";

$result = mysqli_query($conn, $query) or die("Insert Query Failed");

if($result)
{
	echo json_encode(array("message" => "Se ha insertado el Servicio prestado correctamente", "status" => true));	
}
else
{
	echo json_encode(array("message" => "Error al insertar el Servicio prestado", "status" => false));	
}
?>
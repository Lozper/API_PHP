<?php

header("Content-Type: application/json"); 
header("Acess-Control-Allow-Origin: *"); //Origen de la peticion
header("Acess-Control-Allow-Methods: POST"); //Método permitido
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization"); // Seguridad

//decode, convierte un archivo json a un array php
$data = json_decode(file_get_contents("php://input"), true); //Permite leer data del body

//Variables utilizadas para insertar un usuario
$nombre_servicio = $data["nombre_servicio"];
$tipo_servicio = $data["tipo_servicio"];

//Conexion a la bd
require_once "../dbconfig.php";

//Consulta SQL
$query = "INSERT INTO servicio (nombre_servicio, tipo_servicio) VALUES ('$nombre_servicio','$tipo_servicio')";

$result = mysqli_query($conn, $query) or die("Insert Query Failed");

if($result)
{
	echo json_encode(array("message" => "Se ha insertado el servicio correctamente", "status" => true));	
}
else
{
	echo json_encode(array("message" => "Error al insertar el servicio", "status" => false));	
}

?>
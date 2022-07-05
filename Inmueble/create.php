<?php

header("Content-Type: application/json"); 
header("Acess-Control-Allow-Origin: *"); //Origen de la peticion
header("Acess-Control-Allow-Methods: POST"); //Método permitido
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization"); // Seguridad

//decode, convierte un archivo json a un array php
$data = json_decode(file_get_contents("php://input"), true); //Permite leer data del body

//Variables utilizadas para insertar un usuario
$tipoInmueble = $data["tipo_inmueble"];
$numHab = $data["num_habitaciones"];
$valorArriendo = $data["valor_arriendo"];
$pais = $data["pais"];
$dir = $data["direccion"];
$propietario = $data["propietario"];
$url = $data["url_imagen"];

//Conexion a la bd
require_once "../dbconfig.php";

//Consulta SQL
$query = "INSERT INTO inmueble (tipo_inmueble, num_habitaciones, valor_arriendo, pais, direccion, propietario, url_imagen) VALUES ('".$tipoInmueble."', '".$numHab."', ".$valorArriendo.", '".$pais."', '".$dir."', '".$propietario."','".$url."')";

$result = mysqli_query($conn, $query) or die("Insert Query Failed");

if($result)
{
	echo json_encode(array("message" => "Se ha insertado el inmueble correctamente", "status" => true));	
}
else
{
	echo json_encode(array("message" => "Error al insertar el inmueble", "status" => false));	
}

?>
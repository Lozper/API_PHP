<?php

header("Content-Type: application/json"); 
header("Acess-Control-Allow-Origin: *"); //Origen de la peticion
header("Acess-Control-Allow-Methods: POST"); //Método permitido
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization"); // Seguridad

//decode, convierte un archivo json a un array php
$data = json_decode(file_get_contents("php://input"), true); //Permite leer data del body

//Variables utilizadas para insertar un usuario
$username = $data["nombre_usuario"];
$id = $data["id"];
$name = $data["nombre_completo"];
$bDate = $data["fecha_nacimiento"];
$pais = $data["pais"];
$dir = $data["direccion"];
$type = $data["tipo_usuario"];
$mail = $data["correo"];
$pw = $data["clave"];

//Conexion a la bd
require_once "../dbconfig.php";

//Consulta SQL
$query = "INSERT INTO usuario (nombre_usuario, id, nombre_completo, fecha_nacimiento, pais, direccion, tipo_usuario, correo, clave) VALUES ('$username', '$id', '$name', '$bDate', '$pais', '$dir', '$type', '$mail', '$pw')";

$result = mysqli_query($conn, $query) or die("Insert Query Failed");

if($result)
{
	echo json_encode(array("message" => "Se ha insertado el usuario correctamente", "status" => true));	
}
else
{
	echo json_encode(array("message" => "Error al insertar el usuario", "status" => false));	
}

?>
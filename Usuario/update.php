<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT");
header("Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

//Variables para actualizar un usuario
$cod = $data["cod_usuario"];
$username = $data["nombre_usuario"];
$id = $data["id"];
$name = $data["nombre_completo"];
$bDate = $data["fecha_nacimiento"];
$pais = $data["pais"];
$dir = $data["direccion"];
$mail = $data["correo"];
$pw = $data["clave"];

//Conexion BD
require_once "../dbconfig.php";

$query = "UPDATE usuario SET fecha_nacimiento= '$bDate', nombre_completo= '$name', pais= '$pais', direccion= '$dir', correo= '$mail', clave= '$pw', nombre_usuario= '$username',id= '$id' WHERE cod_usuario=$cod";
$result = mysqli_query($conn, $query) or die("Update Query Failed");

if($result)
{	
	echo json_encode(array("message" => "Usuario actualizado exitosamente", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Error al actualizar usuario", "status" => false));	
}

?>
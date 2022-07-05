<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");

require_once "../dbconfig.php";

$query = "SELECT * FROM inmueble";

$result = mysqli_query($conn, $query) or die("Select Query Failed.");

$count = mysqli_num_rows($result);

if($count > 0)
{	
	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($row);
}
else
{	
	echo json_encode(array("message" => "No se encontraron inmuebles.", "status" => false));
}

?>
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers: Authorization, Content-Type");
require_once '../util/util.php';
require_once '../model/flightPassenger.php';

dbConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entity = file_get_contents('php://input');
    $entity = json_decode($entity);
    
    $newId = insertFlightPassenger($entity);
    if (!$newId) echo "Booking Failed, passenger already on that flight!";
    else echo "success";
}

$conn->close();
?>
<?php

function insertFlightPassenger($flightPassenger) {
    global $conn;
    $newId = null;
    $sql = 'INSERT INTO flight_passenger (passenger_id,flight_id) VALUES ' 
                .' (' . $flightPassenger->passengerId . ', ' . $flightPassenger->flightId . ')';
    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        $newId = $conn->insert_id;
    }
    return $newId;
}

?>
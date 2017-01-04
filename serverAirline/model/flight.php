<?php

// SELECT flight.*, seat_count, count(fp.flight_id)
// FROM flight     LEFT JOIN flight_passenger fp ON flight.id = fp.flight_id
//                 LEFT JOIN plane ON flight.plane_id = plane.id
// GROUP BY flight.id




function getFlights($origin=null, $dest=null) {
    global $conn;
    $flights = array();
    // $sql = "SELECT * FROM flight WHERE 1=1 ";
    $sql = <<<EOT
SELECT flight.*, seat_count, count(fp.flight_id) as passengers_count
FROM flight     LEFT JOIN flight_passenger fp ON flight.id = fp.flight_id
                LEFT JOIN plane ON flight.plane_id = plane.id
WHERE 1=1 
EOT;
    if ($origin)    $sql .= ' AND origin="' .   $origin . '" '; 
    if ($dest)      $sql .= ' AND dest="' .     $dest . '" '; 

$sql .= "GROUP BY flight.id";

    $result = $conn->query($sql);

    while($flight = $result->fetch_object()) {
        $flights[] = $flight;
    }
    
    return $flights;
}

function getFlightById($id) {
    global $conn;
    $sql = "SELECT flight.*, plane.model, plane.seat_count FROM flight LEFT JOIN plane ON flight.plane_id = plane.id WHERE flight.id=".$id;
    $result = $conn->query($sql);
    $flight = $result->fetch_object();
    return $flight;
}

function deleteFlightById($id) {
    global $conn;
    $sql = "DELETE FROM flight WHERE id=".$id;
    $result = $conn->query($sql);
    return $result;
}

function insertFlight($flight) {
    global $conn;
    $newId = null;
    $sql = 'INSERT INTO flight (origin, dest, departure_at, plane_id) VALUES ' 
                .' ("' 
                .$flight->origin. '", "' 
                . $flight->dest. '", "' 
                .$flight->departure_at.'", '
                .$flight->plane_id 
                .')';
    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        $newId = $conn->insert_id;
    }
    return $newId;
}

function updateFlight($flight) {
    global $conn;
    $sql = 'UPDATE flight SET origin="' 
                    . $flight->origin .'", dest="' 
                    . $flight->dest .'", departure_at="' 
                    . $flight->departure_at .'", plane_id="' 
                    . $flight->plane_id .'" WHERE id=' . $flight->id;
    $conn->query($sql);
}

?>
<?php
include "connect.php";

$min = filter_input(INPUT_GET, "min", FILTER_VALIDATE_INT);
$max = filter_input(INPUT_GET, "max", FILTER_VALIDATE_INT);

if ($min !== null and $min !== false and $max !== null and $max !== false) {
    $command = "SELECT CityName, CountryCode, CityPopulation FROM City WHERE CityPopulation>=? AND CityPopulation<=? ORDER BY CityPopulation DESC";
    $stmt = $dbh->prepare($command);
    $params = [$min, $max];
    $success = $stmt->execute($params);
    
    if ($success) {
        header('Content-Type: application/json');
        $data = [];
        while ($row = $stmt->fetch()) {
            $info = ["name" => $row["CityName"], "code" => $row["CountryCode"], "population" => $row["CityPopulation"]];
            array_push($data, $info);
        }
        echo json_encode($data);
    }
}
?>
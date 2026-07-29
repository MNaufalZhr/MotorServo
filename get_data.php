<?php

$conn = new mysqli(
    "127.0.0.1",
    "root",
    "",
    "servo_monitoring",
    3307
);

$query = $conn->query("
SELECT *
FROM monitoring_servo
ORDER BY id DESC
LIMIT 100
");

$data = [];

while ($row = $query->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();

?>
<?php

$conn = new mysqli(
    "127.0.0.1",
    "root",
    "",
    "servo_monitoring",
    3307
);

if ($conn->connect_error) {
    die("Connection failed");
}

$sql = "TRUNCATE TABLE monitoring_servo";

if ($conn->query($sql)) {
    echo "OK";
} else {
    echo "FAILED: " . $conn->error;
}

$conn->close();

?>
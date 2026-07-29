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

$setpoint     = $_POST['setpoint'] ?? 0;
$rpm          = $_POST['rpm'] ?? 0;
$pwm          = $_POST['pwm'] ?? 0;
$error        = $_POST['error'] ?? 0;
$pot_adc      = $_POST['pot_adc'] ?? 0;
$sensor_state = $_POST['sensor_state'] ?? 0;

$sql = "INSERT INTO monitoring_servo
(setpoint, rpm, pwm, error, pot_adc, sensor_state)
VALUES
('$setpoint', '$rpm', '$pwm', '$error', '$pot_adc', '$sensor_state')";

if ($conn->query($sql)) {
    echo "OK";
} else {
    echo "FAILED: " . $conn->error;
}

$conn->close();

?>
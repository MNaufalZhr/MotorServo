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

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="data_monitoring_servo.csv"');

$output = fopen("php://output", "w");

fputcsv($output, [
    "ID",
    "Setpoint",
    "RPM Aktual",
    "PWM",
    "Error",
    "Pot ADC",
    "Sensor State",
    "Waktu"
]);

$query = $conn->query("
SELECT *
FROM monitoring_servo
ORDER BY id ASC
");

while ($row = $query->fetch_assoc()) {
    fputcsv($output, [
        $row['id'],
        $row['setpoint'],
        $row['rpm'],
        $row['pwm'],
        $row['error'],
        $row['pot_adc'],
        $row['sensor_state'],
        $row['waktu']
    ]);
}

fclose($output);
$conn->close();

?>
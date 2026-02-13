<?php

$conn = new mysqli("localhost", "root", "Vg#84210", "blood_bank");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $date = $_POST['date'];
    $blood_group = $_POST['blood_group'];
    $contact = trim($_POST['contact']);
    $city = trim($_POST['city']);

    // Simple validation
    if (empty($name) || empty($date) || empty($blood_group) || empty($contact) || empty($city)) {
        die("All fields are required!");
    }

    // Prepare statement (SECURE METHOD)
    $stmt = $conn->prepare("INSERT INTO donors (donor_name, reg_date, blood_group, contact, city) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $date, $blood_group, $contact, $city);

    if ($stmt->execute()) {
        echo "Donor Registered Successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

header("Location: doner-list.php");
exit();



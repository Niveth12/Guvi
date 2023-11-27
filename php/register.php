<?php
// Establish a connection to MySQL
$mysqli = new mysqli("localhost", "root", "", "karups");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Sanitize input data
$username = $mysqli->real_escape_string($_POST['username']);
$password = $mysqli->real_escape_string($_POST['password']);
$email = $mysqli->real_escape_string($_POST['email']);
$phone = $mysqli->real_escape_string($_POST['phone']);
$city = $mysqli->real_escape_string($_POST['city']);
$age = $mysqli->real_escape_string($_POST['age']);
$address = $mysqli->real_escape_string($_POST['address']);

// Use prepared statements to prevent SQL injection
$stmt = $mysqli->prepare("INSERT INTO person (username,password,email,phone,city,age,address) VALUES (?, ? , ? , ? , ? , ? , ?)");
$stmt->bind_param("sssssss", $username, $password,$email,$phone,$city,$age,$address);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>

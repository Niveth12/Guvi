<?php
// Establish a connection to your MySQL database
$mysqli = new mysqli("localhost", "root", "", "karups");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Sanitize input data
$username = $mysqli->real_escape_string($_POST['username']);
$password = $mysqli->real_escape_string($_POST['password']);

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("SELECT * FROM person WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    // Authentication successful
    echo "Login successful!";
} else {
    // Authentication failed
    echo "Login failed. Invalid username or password.";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>

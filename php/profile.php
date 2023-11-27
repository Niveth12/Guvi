<?php
// Establish a connection to your MySQL database
$mysqli = new mysqli("localhost", "root", "", "karups");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Sanitize input data
$username = $mysqli->real_escape_string($_POST['username']);

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("SELECT * FROM person WHERE username = ?");
$stmt->bind_param("s", $username);

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    // User found, fetch details
    $userDetails = $result->fetch_assoc();
    
    // Display the user's information
    echo "Welcome, " . $userDetails['username'] . "!<br>";
    echo "Email: " . $userDetails['email'] . "<br>";
    echo "Phone: " . $userDetails['phone'] . "<br>";
    echo "Age: " . $userDetails['age'] . "<br>";
    echo "Address: " . $userDetails['address'] . "<br>";
    echo "city: " . $userDetails['city'] . "<br>";

} else {
    // User not found, handle accordingly
    echo "User not found.";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>

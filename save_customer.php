<?php
session_start();
if (!isset($_SESSION['id']) || ($_SESSION['id'] !== 'customer1' && $_SESSION['id'] !== 'customer2')) {
    header("Location: login.html"); // Redirect if not logged in as customer1 or customer2
}

// Validate and sanitize the input data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Perform necessary data validation (e.g., email format, phone number format)
// You can use built-in PHP functions or regular expressions for validation

// If validation fails, handle the error accordingly
// For example:
/*
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    return;
}

if (!preg_match('/^[0-9]{10}$/', $phone)) {
    echo "Invalid phone number format";
    return;
}
*/

// If validation succeeds, proceed to store the customer details in the database

// Establish a connection to the MySQL database
$servername="localhost";
$username="root";
$password="";
$database_name="customer";
$conn = new mysqli($servername,$username,$password,$database_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the customer ID from the session
$customerID = $_SESSION['id'];

// Insert the customer details into the database
$query = "INSERT INTO customer (id, name, email, phone) VALUES ('$customerID', '$name', '$email', '$phone')";
if ($conn->query($query) === TRUE) {
    echo "Customer details saved successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>

<?php
session_start();
if (!isset($_SESSION['id']) || ($_SESSION['id'] !== 'customer1' && $_SESSION['id'] !== 'customer2')) {
    header("Location: login.html"); // Redirect if not logged in as customer1 or customer2
}

// Establish a connection to the MySQL database
$servername="localhost";
$username="root";
$password="";
$database_name="customer";
$conn = new mysqli($servername,$username,$password,$database_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data input from the form
$data = $_POST['data'];
$id = $_SESSION['id'];

// Insert data into the database
$query = "INSERT INTO customer_detail (id, data) VALUES ('$id', '$data')";
if ($conn->query($query) === TRUE) {
    echo "Data saved successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>

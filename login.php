<?php
session_start();

// Establish a connection to the MySQL database
$servername="localhost";
$username="root";
$password="";
$database_name="customer";
$conn = new mysqli($servername,$username,$password,$database_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
// Retrieve user input from the login form
$id = $_POST['id'];
$password = $_POST['password'];

// Query the database to check if the user exists and the password is correct
$query = "SELECT * FROM auth WHERE id = '$id' AND password = '$password'";
$result = $conn->query($query);

// Redirect the user based on the query result
if ($result->num_rows > 0) {
    // Successful login
    $_SESSION['id'] = $id;
    if ($id === 'admin') {
        header("Location: view_data.php"); // Redirect to view data for admin
    } else {
        header("Location: customer_form.php"); // Redirect to form for customer1 or customer2
    }
} else {
    // Invalid login
    echo "Invalid ID or password";
}

$conn->close();
?>

<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] !== 'admin') {
    header("Location: login.html"); // Redirect if not logged in as admin
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

// Retrieve data from the database
$query = "SELECT * FROM customer_detail";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
  <title>View Data</title>
</head>
<body>
  <h1>Welcome, <?php echo $_SESSION['id']; ?>!</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Data</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['data']; ?></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>


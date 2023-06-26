<?php
session_start();
if (!isset($_SESSION['id']) || ($_SESSION['id'] !== 'customer1' && $_SESSION['id'] !== 'customer2')) {
    header("Location: login.html"); // Redirect if not logged in as customer1 or customer2
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Enter Data</title>
</head>
<body>
  <h1>Welcome, <?php echo $_SESSION['id']; ?>!</h1>
  <form method="post" action="save_data.php">
    <label for="data">Data:</label>
    <input type="text" name="data" id="data" required>
    <br>
    <input type="submit" value="Save">
  </form>
</body>
</html>

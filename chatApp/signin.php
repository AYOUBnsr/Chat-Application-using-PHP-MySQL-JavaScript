<?php
session_start();
include 'dbh.php';

$uname = $_POST['uname'];
$pass = $_POST['Password']; // Changed $Pass to $pass (case-sensitive)

$sql = "SELECT * FROM signup WHERE username='$uname' AND password='$pass'"; // Corrected case-sensitive variable
$result = $conn->query($sql);

if (!$row = $result->fetch_assoc()) {
    header("Location: error.php");
} else {
    $_SESSION['name'] = $row['username']; // Used $row['username'] to get the username from the fetched row
    header("Location: home.php");
}
?>

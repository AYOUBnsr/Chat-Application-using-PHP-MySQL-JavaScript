<?php
session_start();
include 'dbh.php';
$msg = $_POST['msg'];
$name = $_SESSION['name'];

$sql = "INSERT INTO posts (msg, name) VALUES ('$msg', '$name')";
$result = $conn->query($sql);

header("Location: home.php");
?>
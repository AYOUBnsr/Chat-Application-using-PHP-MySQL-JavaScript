<?php
$conn = mysqli_connect("localhost","root","","chatapp");
if (!$conn) {
    die("connection failed".mysqli_connect_error());
}
?>
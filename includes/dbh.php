<?php

$servername = "127.0.0.1"; 
$dbUsername="root";
$dbPassword="4eOjaddh7XcR0dqi";
$dbName="swigpics";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
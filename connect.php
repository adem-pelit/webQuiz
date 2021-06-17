<?php
$servername = "localhost";
$username   = "285596";
$password   = "btu10015";
$dbname     = "285596";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) die("{}");
?>
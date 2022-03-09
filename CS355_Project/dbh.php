<?php

$serverName = "localhost";
$dbUsername = "scot";
$dbPassword = "tiger";
$dbName = "GuestHouse";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn)
{
    die("<script>alert('Connection Failed.')</script>");
}
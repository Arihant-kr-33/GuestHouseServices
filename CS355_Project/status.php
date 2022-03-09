<?php
    session_start();
    require 'dbh.php';
    $application_id = $_GET["application_id"];
    $st = $_GET["st"];
    $sql = "UPDATE Application SET status='$st' WHERE application_id='$application_id';";
    $result = mysqli_query($conn, $sql);
    header("location: adminapplications.php");
?>
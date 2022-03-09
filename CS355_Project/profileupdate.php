<?php
session_start();
require 'dbh.php';
if(isset($_POST["submit"]))
{
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $hash = md5($password);
    $sql = "SELECT * FROM IITP_User WHERE user_id = '$user_id';";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_array($result);
    if(!$res)
    {
        echo "<p style='text-align: center; color: red;'>Incorrect Institute ID Entered.</p>";
    }
    else if($hash !== $res["password"])
    {
        echo "<p style='text-align: center; color: red;'>Incorrect Password Entered.</p>";
    }
    else
    {
        $sql = "UPDATE IITP_User SET phone = '$phone' WHERE user_id = '$user_id';";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $_SESSION["phone"] = $phone;
            echo "<p style='text-align: center; color: green;'>Updated Successfully.</p>";
        }
        else
        {
            echo "<p style='text-align: center; color: red;'>Sorry, Try Again!</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6">
<div class="container" style="background-color: #90E0EF; position: relative; top: 100px; height: 411px;">
    <h2 style="color: #673ab7; text-align: center;">PROFILE UPDATE</h2>
    <form action="" method="post">
        <input type="text" name="user_id" class="email" placeholder="institute id">
        <br/>
        <input type="password" name="password" class="pwd" placeholder="password">
        <br/>
        <input type="text" name="phone" class="email" placeholder="contact no">
        <br/><br/>
        <button type="button" class="register" onclick="window.location.href = 'home.php'">
        <span>back</span>
        </button>
        <button class="signin" type="submit" name="submit">
            <span>update</span>
        </button>
    </form>
    <div class="reg"></div>
    <div class="sig"></div>

    
    
    </div>
</body>
</html>
<?php
require 'dbh.php';

if(isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $user_id = $_POST["user_id"];
    $department = $_POST["department"];
    $designation = $_POST["designation"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];
    $sql = "SELECT * FROM IITP_User WHERE user_id = '$user_id';";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);
    if($res)
    {
        echo "<p style='text-align: center; color: red;'>Oops! Account with this INSTITUTE ID already exists.</p>";
    }
    else if($password !== $passwordrepeat)
    {
        echo "<p style='text-align: center; color: red;'>Oops! Passwords entered don't match.</p>";
    }
    else
    {
        $hash = md5($password);
        $sql = "INSERT INTO IITP_User VALUES ('$user_id', '$hash', '$name', '$designation', '$department', '$phone', '$email');";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            echo "<p style='text-align: center; color: green;'>Congrats! User Registered Successfully.</p>";
        }
        else
        {
            echo "<p style='text-align: center; color: red;'>Something went wrong! Try again.</p>";
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
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="styles.css">
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
<div class="container" style="background-color: #90E0EF; top: 5px; height: 646px;">
    <h2 style="color: #673ab7; text-align: center;">REGISTER</h2>
    <form action="registration.php" method="post">
        <input type="text" name="name" class="email" placeholder="full name*" required>
        <br/>
        <input type="text" name="user_id" class="email" placeholder="institute id*" style="display: inline; float: left; width: 150px; position: relative; left:27px;" required>
        <input type="text" name="department" class="email" placeholder="department*" style="position: relative; left: 15px; width: 270px;" required>
        <br/>
        <input type='text' name="designation" class="email" placeholder="designation*" list='dlistid' style="display: inline; float: left; width: 150px; position: relative; left:27px;" required>
        <datalist id='dlistid'>
            <option value='STUDENT'>
            <option value='STAFF'>
        </datalist>
        <input type="text" name="phone" class="email" placeholder="Contact No*" style="position: relative; left: 15px; width: 270px;" required>
        <br/>
        <input type="email" name="email" class="email" placeholder="institute webmail*" required>
        <br/>
        <input type="password" name="password" class="pwd" placeholder="password*" required>
        <br/>
        <input type="password" name="passwordrepeat" class="pwd" placeholder="confirm password*" required>
        <br/><br/>
        <button type="button" class="register" onclick="window.location.href = 'index.php'">
        <span>SIGN IN</span>
        </button>
        <button class="signin" type="submit" name="submit">
            <span>REGISTER</span>
        </button>
    </form>
    <div class="reg"></div>
    <div class="sig"></div>

    
    
    </div>
</body>
</html>
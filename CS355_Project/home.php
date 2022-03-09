<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE PAGE</title>
    <link rel="stylesheet" href="styles.css">
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
<div class="container" style="background-color: #90E0EF; top: 90px; height: 511px; border-radius: 0px;">
    <h2 style="color: black; text-align: center; height: 30px; font-size: 25px;"><b>PROFILE</b></h2>       <p style="height: 50px; color: black; font-size: 25px; position: relative; left: 40px;"><b>NAME : </b><span style="color: #000066;"><b><?php echo $_SESSION["name"];?></b></span></p>
        <p style="height: 50px; color: black; font-size: 25px; position: relative; left: 40px;"><b>INSTITUTE ID : </b><span style="color: #000066;"><b><?php echo $_SESSION["user_id"];?></b></span></p>
        <p style="height: 50px; color: black; font-size: 25px; position: relative; left: 40px;"><b>DESIGNATION : </b><span style="color: #000066;"><b><?php echo $_SESSION["designation"];?></b></span></p>
        <p style="height: 50px; color: black; font-size: 25px; position: relative; left: 40px;"><b>DEPARTMENT : </b><span style="color: #000066;"><b><?php echo $_SESSION["department"];?></b></span></p>
        <p style="height: 50px; color: black; font-size: 25px; position: relative; left: 40px;"><b>CONTACT NO : </b><span style="color: #000066;"><b><?php echo $_SESSION["phone"];?></b></span></p>
        <p style="height: 50px; color: black; font-size: 25px; position: relative; left: 40px;"><b>EMAIL ID : </b><span style="color: #000066;"><b><?php echo $_SESSION["email"];?></b></span></p><br/><br/>
        <div>
        <button type="button" class="register" style="background: #9C19E0;" onclick="window.location.href = 'pricelist.php'">
        <span>price list</span>
        </button>
        <button class="signin" type="submit" style="background: #ff5722"name="submit" onclick="window.location.href = 'profileupdate.php'">
            <span>update</span>
        </button>
        </div>
        <button type="button" class="register" style="background: red;" onclick="window.location.href = 'logout.php'">
        <span>sign out</span>
        </button>
        <button class="signin" type="submit" style="background: #000066;" name="submit" onclick="window.location.href = 'booking.php'">
            <span>booking</span>
        </button>
    <div class="reg"></div>
    <div class="sig"></div>

    
    
    </div>
</body>
</html>
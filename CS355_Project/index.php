<?php
session_start();
require 'dbh.php';
if(isset($_POST["submit"]))
{
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM IITP_User WHERE user_id = '$user_id';";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_array($result);
    $hash = md5($password);
    if(mysqli_num_rows($result) === 0)
    {
        echo "<p style='text-align: center; color: red;'>Incorrect Institute ID Entered.</p>";
    }
    else if($hash !== $res["password"])
    {
        echo "<p style='text-align: center; color: red;'>Incorrect Password Entered.</p>";
    }
    else
    {
        if($res["user_id"]=="ADMIN")
        {
            $_SESSION["user_id"] = $res["user_id"];
            $_SESSION["password"] = $res["password"];
            header("location: adminhome.php");
        }
        else
        {
            $_SESSION["user_id"] = $res["user_id"];
            $_SESSION["password"] = $res["password"];
            $_SESSION["name"] = $res["name"];
            $_SESSION["department"] = $res["department"];
            $_SESSION["designation"] = $res["designation"];
            $_SESSION["phone"] = $res["phone"];
            $_SESSION["email"] = $res["email"];
            header("location: home.php");
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
    <title>LOGIN</title>
    <link rel="stylesheet" href="styles.css">
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
    <!-- <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="800px" height="600px" viewBox="0 0 800 600" enable-background="new 0 0 800 600" xml:space="preserve">
    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="174.7899" y1="186.34" x2="330.1259" y2="186.34" gradientTransform="matrix(0.8538 0.5206 -0.5206 0.8538 147.9521 -79.1468)">
        <stop  offset="0" style="stop-color:#FFC035"/>
        <stop  offset="0.221" style="stop-color:#F9A639"/>
        <stop  offset="1" style="stop-color:#E64F48"/>
    </linearGradient>
    <circle fill="url(#SVGID_1_)" cx="266.498" cy="211.378" r="77.668"/>
    <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="290.551" y1="282.9592" x2="485.449" y2="282.9592">
        <stop  offset="0" style="stop-color:#FFA33A"/>
        <stop  offset="0.0992" style="stop-color:#E4A544"/>
        <stop  offset="0.9624" style="stop-color:#00B59C"/>
    </linearGradient>
    <circle fill="url(#SVGID_2_)" cx="388" cy="282.959" r="97.449"/>
    <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="180.3469" y1="362.2723" x2="249.7487" y2="362.2723">
        <stop  offset="0" style="stop-color:#12B3D6"/>
        <stop  offset="1" style="stop-color:#7853A8"/>
    </linearGradient>
    <circle fill="url(#SVGID_3_)" cx="215.048" cy="362.272" r="34.701"/>
    <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="367.3469" y1="375.3673" x2="596.9388" y2="375.3673">
        <stop  offset="0" style="stop-color:#12B3D6"/>
        <stop  offset="1" style="stop-color:#7853A8"/>
    </linearGradient>
    <circle fill="url(#SVGID_4_)" cx="482.143" cy="375.367" r="114.796"/>
    <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="365.4405" y1="172.8044" x2="492.4478" y2="172.8044" gradientTransform="matrix(0.8954 0.4453 -0.4453 0.8954 127.9825 -160.7537)">
        <stop  offset="0" style="stop-color:#FFA33A"/>
        <stop  offset="1" style="stop-color:#DF3D8E"/>
    </linearGradient>
    <circle fill="url(#SVGID_5_)" cx="435.095" cy="184.986" r="63.504"/>
    </svg> -->


    <div class="container" style="background-color: #90E0EF; position: relative; top: 150px; height: 368px;">
    <h2 style="color: black; text-align: center;"><b>GUEST HOUSE SERVICES</b></h2>
    <form action="" method="post">
        <input type="test" class="email" name="user_id" placeholder="INSTITUTE ID">
        <br/>
        <input type="password" class="pwd" name="password" placeholder="password">
        <a href="#" class="link" style="position: relative; left: 30px;">Forgot password ?</a>
        <br/>
        <button type="button" class="register" onclick="window.location.href = 'registration.php'">
        <span>register</span>
        </button>
        <button class="signin" type="submit" name="submit">
            <span>sign in</span>
        </button>
    </form>

    
    
    </div>
</body>
</html>
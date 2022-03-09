<?php
session_start();
require 'dbh.php';
$_SESSION["abrc"] = 0;
$_SESSION["nbrc"] = 0;
if(isset($_POST["submit"]))
{
    $dateValue=$_POST["bkdate"];
    $time=strtotime($dateValue);
    $month=date("m",$time);
    $year=date("Y",$time);
    $sql = "CALL Monthly_booking_categories($month, $year);";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        if($row["category"]=="ATTACHED BATHROOM")
        {
            $_SESSION["abrc"] = $row["count(*)"];
        }
        else
        {
            $_SESSION["nbrc"] = $row["count(*)"];
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
    <title>MONTHLY BOOKING</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
    <div class="container" style=" height: 470px; width: 700px; position: relative; top: 100px; left: 0%; background-color: #90E0EF;">
        <h2 style="color: black; text-align: center; position: relative; top: -15px;">MONTHLY BOOKING UNDER VARIOUS CATEGORIES</h2>
            <form action="" method="post" style="position: relative; top: -30px;">
                <input type="date" name="bkdate" style="width: 190px; height: 45px; text-transform: uppercase; text-align: center; position: relative; left: 36%;">
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px; top: 40px;"><b>ATTACHED BATHROOM : &emsp;&emsp;&ensp;&ensp;&nbsp;</b><span><?php echo $_SESSION["abrc"];?></span></p>
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px; top: 40px;"><b>NON ATTACHED BATHROOM : &ensp;&nbsp;</b><span><?php echo $_SESSION["nbrc"];?></span></p>
                <button type="submit" name="submit" class="btn btn-outline-success" style="position: relative; left: 300px; top: 50px;">CHECK</button>
            </form>
    </div>
    <br/><br/><br/><br/><br/>
    <button type="button" class="register" style="position: relative; left: 42%; top: -60px; border-radius: 5px; background: #ff5722; color: black; border: 2px solid black;" onclick="window.location.href = 'adminhome.php'">
            <span style="position: relative; left: 0px;">BACK</span>
    </button>
</body>
</html>
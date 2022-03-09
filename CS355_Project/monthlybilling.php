<?php
session_start();
require 'dbh.php';
$_SESSION["mrb"] = 0;
$_SESSION["mfb"] = 0;
$_SESSION["mghb"] = 0;
if(isset($_POST["submit"]))
{
    $dateValue=$_POST["bkdate"];
    $time=strtotime($dateValue);
    $month=date("m",$time);
    $year=date("Y",$time);
    $dt = $year.'-'.$month.'-'.'01';
    $sql = "SELECT SUM(room_bill) AS Monthly_Room_Billing FROM Payment WHERE application_id IN (SELECT application_id FROM Application WHERE TIMESTAMPDIFF(DAY, '$dt', arrival_date)  >= 0 AND TIMESTAMPDIFF(DAY, LAST_DAY('$dt'), arrival_date) <= 0);";
    $sql1 = "CALL Monthly_food_billing($month, $year);";
    $res = mysqli_query($conn, $sql);
    $res1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($res);
    $row1 = mysqli_fetch_array($res1);
    $_SESSION["mrb"] = $row["Monthly_Room_Billing"];
    $_SESSION["mfb"] = $row1["Monthly_Food_Billing"];
    $_SESSION["mghb"] = $_SESSION["mfb"] + $_SESSION["mrb"];
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONTHLY BILLING</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
    <div class="container" style=" height: 470px; width: 700px; position: relative; top: 50px; left: 0%; background-color: #90E0EF;">
        <h2 style="color: black; text-align: center; position: relative; top: -15px;">MONTHLY GUEST HOUSE BILLING</h2>
            <form action="" method="post" style="position: relative; top: -30px;">
                <input type="date" name="bkdate" style="width: 190px; height: 45px; text-transform: uppercase; text-align: center; position: relative; left: 36%;">
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px; top: 40px;"><b>MONTHLY ROOM BILLING : &emsp;&emsp;&emsp;&emsp;&emsp;</b><span style="color: black;">₹&nbsp;<?php echo $_SESSION["mrb"];?></span></p>
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px; top: 40px;"><b>MONTHLY FOOD BILLING : &ensp;&nbsp;&emsp;&emsp;&emsp;&emsp;</b><span style="color: black;">&ensp;₹&nbsp;<?php echo $_SESSION["mfb"];?></span></p>
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px; top: 40px;"><b>MONTHLY GUEST HOUSE BILLING : &ensp;&nbsp;</b><span style="color: black;">&ensp;₹&nbsp;<?php echo $_SESSION["mghb"];?></span></p>
                <button type="submit" name="submit" class="btn btn-outline-success" style="position: relative; left: 300px; top: 50px;">CHECK</button>
            </form>
    </div>
    <br/><br/><br/><br/><br/>
    <button type="button" class="register" style="position: relative; left: 42%; top: -100px; border-radius: 5px; background: #ff5722; color: black; border: 2px solid black;" onclick="window.location.href = 'adminhome.php'">
            <span style="position: relative; left: 0px;">BACK</span>
    </button>
</body>
</html>
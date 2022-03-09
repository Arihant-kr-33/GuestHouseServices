<?php
session_start();
$_SESSION["Total_Monthly_Expenditure"] = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONTHLY EXPENDITURE</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
    <div class="container" style=" height: 600px; width: 600px; position: relative; top: 10px; left: 0%; background-color: #90E0EF;">
        <h2 style="color: #673ab7; text-align: center; position: relative; top: -15px;">MONTHLY EXPENDITURE</h2>
        <form action="" method="post" style="position: relative; top: -50px;">
            <p style="position: relative; left: 75px;"><span><input type="date" name="expdate" class="email" style="width: 200px; height: 40px;"></input></span>&emsp;&emsp;<span><button type="submit" name="submit" class="btn btn-outline-success">CHECK</button></span></p>
        </form>
        <ul class="list-group" style="overflow:scroll; max-height: 400px; margin-bottom: 10px; position: relative; top: -35px;">
            <li class="list-group-item" style="color: #0077B6;"><span><b>SERVICE</b></span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span><b>DATE</b></span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;<span><b>EXPENSES</b></span></li>
            <?php
                session_start();
                require 'dbh.php';
                if(isset($_POST["submit"]))
                {
                    $dateValue=$_POST["expdate"];
                    $time=strtotime($dateValue);
                    $month=date("m",$time);
                    $year=date("Y",$time);
                    $day=$year.'-'.$month.'-'.'01';
                    $sql = "SELECT * FROM Expenditure WHERE TIMESTAMPDIFF(DAY, '$day', dt)  >= 0 AND TIMESTAMPDIFF(DAY, LAST_DAY('$day'), dt) <= 0;";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        echo '<li class="list-group-item"><span><b>'.$row["category"].'</b></span><span style="position: absolute; left: 205px;"><b>'.$row["dt"].'</b></span><span style="position: absolute; left: 400px;"><b>₹&nbsp;'.$row["amount"].'</b></span></li>';
                    }
                    $sql ="CALL Total_Monthly_Expenditure($month, $year);";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $_SESSION["Total_Monthly_Expenditure"] = $row["Total_Monthly_Expenditure"];
                    // $sql ="CALL Monthly_Food_Billing($month, $year);";
                    // $result = mysqli_query($conn, $sql);
                    // $row = mysqli_fetch_array($result);
                    // $_SESSION["Monthly_Food_Billing"] = $row["Monthly_Food_Billing"];
                    // $sql ="CALL Monthly_room_Billing($month, $year);";
                    // $result = mysqli_query($conn, $sql);
                    // $row = mysqli_fetch_array($result);
                    // $_SESSION["Monthly_room_Billing"] = $row["Monthly_room_Billing"];
                    // $sql ="CALL Monthly_room_Billing($month, $year);";Monthly_guest_house_billing
                    // $result = mysqli_query($conn, $sql);
                    // $row = mysqli_fetch_array($result);
                    // $_SESSION["Monthly_room_Billing"] = $row["Monthly_room_Billing"];
                }
            ?>
        </ul>
        <h3 style="text-align: center; color: brown;">Total : &nbsp;₹ <?php echo $_SESSION["Total_Monthly_Expenditure"];?></h3>
    </div>
    <button type="button" class="register" style="position: relative; left: 42%; top: -45px; border-radius: 5px; background: #ff5722; color: black; border: 2px solid black;" onclick="window.location.href = 'adminhome.php'">
            <span style="position: relative; left: 0px;">BACK</span>
    </button>
</body>
</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUR APPLICATIONS</title>
    <link rel="stylesheet" href="styles1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
    <div class="container" style=" height: 535px; width: 700px; position: relative; top: 40px; left: 0%; background-color: #90E0EF;">
        <h2 style="color: #673ab7; text-align: center; position: relative; top: -15px;">YOUR APPLICATIONS</h2>
        <ul class="list-group" style="overflow:scroll; max-height: 400px; margin-bottom: 10px; position: relative; top: -35px;">
            <li class="list-group-item" style="color: #0077B6;"><span><b>APPLICATION ID</b></span> &emsp;&emsp;&ensp; <span><b>DATE</b></span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<span><b>TIME</b></span>&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;<span><b>STATUS</b></span></li>
            <?php
                $user_id =$_SESSION["user_id"];
                require 'dbh.php';
                $sql = "SELECT * FROM Application WHERE user_id = '$user_id';";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result))
                {
                    $reformatted_datetimearray = explode(" ", $row["time"]);
                    $reformatted_date = $reformatted_datetimearray[0];
                    $reformatted_time = $reformatted_datetimearray[1];
                    $reformatted_date = date('d-m-Y',strtotime($reformatted_date));
                    $reformatted_time = date('H:i:s',strtotime($reformatted_time));
                    if($row["status"]=="ACCEPTED")
                    {
                        echo '<li class="list-group-item"><span><a href="display.php?application_id='.$row["application_id"].'">'.$row["application_id"].'</a></span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span><b>'.$reformatted_date.'</b></span> &emsp;&emsp;&emsp;&emsp; <span><b>'.$reformatted_time.'</b></span>&emsp;&emsp;&emsp;&emsp;<span style="color: green;"><b>ACCEPTED</b></span></li>';
                    }
                    else if($row["status"]=="REJECTED")
                    {
                        echo '<li class="list-group-item"><span><a href="display.php?application_id='.$row["application_id"].'">'.$row["application_id"].'</a></span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span><b>'.$reformatted_date.'</b></span> &emsp;&emsp;&emsp;&emsp; <span><b>'.$reformatted_time.'</b></span>&emsp;&emsp;&emsp;&emsp;<span style="color: red;"><b>REJECTED</b></span></li>';
                    }
                    else
                    {
                        echo '<li class="list-group-item"><span><a href="display.php?application_id='.$row["application_id"].'">'.$row["application_id"].'</a></span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span><b>'.$reformatted_date.'</b></span> &emsp;&emsp;&emsp;&emsp; <span><b>'.$reformatted_time.'</b></span>&emsp;&emsp;&emsp;&emsp;<span style="color: grey;"><b>PENDING</b></span></li>';
                    }
                }
            ?>
        </ul>
    </div>
    <button type="button" class="register" style="position: relative; left: 31%; top: -20px; border-radius: 5px; background: #ff5722; color: black; border: 2px solid black;" onclick="window.location.href = 'home.php'">
            <span style="position: relative; left: 0px;">BACK</span>
    </button>
    <button type="button" class="register" style="position: relative; left: 35%; top: -20px; border-radius: 5px; background: #673ab7; color: black; border: 2px solid black;" onclick="window.location.href = 'application.php'">
            <span style="position: relative; left: 0px;">NEW APPLICATION</span>
    </button>
</body>
</html>
    <!-- </ul>
</div>
<div style="position: relative; top: -250px;">
    <button type="button" style="position: relative; top: 200px; left: 470px;" class="register" onclick="window.location.href = 'home.php'">
    <span style="position: relative; text-align: center;">back</span>
    </button>
    <button class="signin" style="position: relative; top: 200px; right: 470px; float: right;" type="button" onclick="window.location.href = 'application.php'" >
        <span style="position: relative; text-align: center;">new application</span>
    </button>
</div>
</body>
</html> -->
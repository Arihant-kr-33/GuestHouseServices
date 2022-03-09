<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BILLING</title>
    <link rel="stylesheet" href="styles1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
    <div class="container" style=" height: 535px; width: 500px; position: relative; top: 40px; left: 0%; background-color: #90E0EF;">
        <h2 style="color: #673ab7; text-align: center; position: relative; top: -15px;">BILLS</h2>
        <ul class="list-group" style="overflow:scroll; max-height: 400px; margin-bottom: 10px; position: relative; top: -35px;">
            <li class="list-group-item" style="color: #0077B6;"><span><b>APPLICATION ID</b></span> &emsp;&emsp;&ensp; <span><b>STATUS</b></span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<span><b>DATE</b></span></li>
            <?php
                session_start();
                require 'dbh.php';
                $sql = "SELECT * FROM Payment;";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result))
                {
                    echo '<li class="list-group-item"><span><a href="billing.php?application_id='.$row["application_id"].'">'.$row["application_id"].'</a></span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span style="position: absolute; left: 190px;"><b>'.$row["pay_status"].'</b></span> <span style="position: absolute; left: 342px;"><b>'.$row["payment_date"].'</b></span></li>';
                }
            ?>
        </ul>
    </div>
    <button type="button" class="register" style="position: relative; left: 42%; top: -20px; border-radius: 5px; background: #ff5722; color: black; border: 2px solid black;" onclick="window.location.href = 'adminhome.php'">
            <span style="position: relative; left: 0px;">BACK</span>
    </button>
</body>
</html>
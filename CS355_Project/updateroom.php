<?php
session_start();
require 'dbh.php';
$sql = "SELECT * FROM Room_Rent;";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($result))
{
    if($row["category"]=="ATTACHED BATHROOM")
    {
        $_SESSION["abrp"] = $row["rent"];
    }
    else
    {
        $_SESSION["nbrp"] = $row["rent"];
    }
}
if(isset($_POST["submit"]))
{
    $att = $_POST["att"];
    $natt = $_POST["natt"];
    $sql1 = "UPDATE Room_Rent SET rent = '$att' WHERE category = 'ATTACHED BATHROOM';";
    $sql2 = "UPDATE Room_Rent SET rent = '$natt' WHERE category = 'NON ATTACHED BATHROOM';";
    $result = mysqli_query($conn,$sql1);
    $result = mysqli_query($conn,$sql2);
    $_SESSION["abrp"] = $att;
    $_SESSION["nbrp"] = $natt;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE ROOM PRICES</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
    <div class="container" style=" height: 300px; width: 700px; position: relative; top: 150px; left: 0%; background-color: #90E0EF;">
        <h2 style="color: black; text-align: center; position: relative; top: -15px;">UPDATE ROOM PRICES</h2>
            <form action="" method="post" style="position: relative; top: -30px;">
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px;"><b>ATTACHED BATHROOM : &emsp;&emsp;&ensp;&ensp;₹&nbsp;</b><span><input type="number" name="att" style="width: 200px; height: 30px;" placeholder=<?php echo '"'.$_SESSION["abrp"].'"';?> required></input></span></p>
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px;"><b>NON ATTACHED BATHROOM : &ensp;₹&nbsp;</b><span><input type="number" name="natt" style="width: 200px; height: 30px;" placeholder=<?php echo '"'.$_SESSION["nbrp"].'"';?> required></input></span></p>
                <button type="submit" name="submit" class="btn btn-outline-success" style="position: relative; left: 300px;">UPDATE</button>
            </form>
    </div>
    <br/><br/><br/><br/><br/>
    <button type="button" class="register" style="position: relative; left: 42%; top: -20px; border-radius: 5px; background: #ff5722; color: black; border: 2px solid black;" onclick="window.location.href = 'adminhome.php'">
            <span style="position: relative; left: 0px;">BACK</span>
    </button>
</body>
</html>
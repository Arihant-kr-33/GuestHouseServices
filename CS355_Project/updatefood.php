<?php
session_start();
require 'dbh.php';
$sql = "SELECT * FROM Food_Price;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$_SESSION["vbp"] = $row["veg_bf"];
$_SESSION["nbp"] = $row["non_veg_bf"];
$_SESSION["vlp"] = $row["veg_lh"];
$_SESSION["nlp"] = $row["non_veg_lh"];
$_SESSION["vdp"] = $row["veg_dn"];
$_SESSION["ndp"] = $row["non_veg_dn"];
if(isset($_POST["submit"]))
{
    $sql = "DELETE FROM Food_Price;";
    $result = mysqli_query($conn, $sql);
    $vbp = $_POST["vbp"];
    $nbp = $_POST["nbp"];
    $vlp = $_POST["vlp"];
    $nlp = $_POST["nlp"];
    $vdp = $_POST["vdp"];
    $ndp = $_POST["ndp"];
    $sql = " INSERT INTO Food_Price VALUES ($vbp,$nbp,$vlp,$nlp,'$vdp','$ndp');";
    $result = mysqli_query($conn, $sql);
    $_SESSION["vbp"] = $vbp;
    $_SESSION["nbp"] = $nbp;
    $_SESSION["vlp"] = $vlp;
    $_SESSION["nlp"] = $nlp;
    $_SESSION["vdp"] = $vdp;
    $_SESSION["ndp"] = $ndp;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE FOOD PRICES</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
    <div class="container" style=" height: 535px; width: 700px; position: relative; top: 40px; left: 0%; background-color: #90E0EF;">
        <h2 style="color: black; text-align: center; position: relative; top: -15px;">UPDATE FOOD PRICES</h2>
            <form action="" method="post" style="position: relative; top: -30px;">
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px;"><b>BREAKFAST VEGITARIAN : &emsp;&emsp;&ensp;₹&nbsp;</b><span><input type="number" name="vbp" style="width: 200px; height: 30px;" placeholder=<?php echo '"'.$_SESSION["vbp"].'"';?> required></input></span></p>
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px;"><b>BREAKFAST NON VEGITARIAN : ₹&nbsp;</b><span><input type="number" name="nbp" style="width: 200px; height: 30px;" placeholder=<?php echo '"'.$_SESSION["nbp"].'"';?> required></input></span></p>
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px;"><b>LUNCH VEGITARIAN : &emsp;&emsp;&emsp;&emsp;&emsp;₹&nbsp;</b><span><input type="number" name="vlp" style="width: 200px; height: 30px;" placeholder=<?php echo '"'.$_SESSION["vlp"].'"';?> required></input></span></p>
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px;"><b>LUNCH NON VEGITARIAN : &emsp;&emsp;&ensp;₹&nbsp;</b><span><input type="number" name="nlp" style="width: 200px; height: 30px;" placeholder=<?php echo '"'.$_SESSION["nlp"].'"';?> required></input></span></p>
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px;"><b>DINNER VEGITARIAN : &emsp;&emsp;&emsp;&emsp;&ensp;₹&nbsp;</b><span><input type="number" name="vdp" style="width: 200px; height: 30px;" placeholder=<?php echo '"'.$_SESSION["vdp"].'"';?> required></input></span></p>
                <p style="height: 50px; color: #673ab7; font-size: 25px; position: relative; left: 40px;"><b>DINNER NON VEGITARIAN : &emsp;&emsp;₹&nbsp;</b><span><input type="number" name="ndp" style="width: 200px; height: 30px;" placeholder=<?php echo '"'.$_SESSION["ndp"].'"';?> required></input></span></p>
                <button type="submit" name="submit" class="btn btn-outline-success" style="position: relative; left: 300px;">UPDATE</button>
            </form>
    </div>
    <button type="button" class="register" style="position: relative; left: 42%; top: -20px; border-radius: 5px; background: #ff5722; color: black; border: 2px solid black;" onclick="window.location.href = 'adminhome.php'">
            <span style="position: relative; left: 0px;">BACK</span>
    </button>
</body>
</html>
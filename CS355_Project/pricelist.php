<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATALOGUE</title>
    <link rel="stylesheet" href="styles.css">
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
<div class="container" style="background-color: #90E0EF; top: 70px; height: 511px; border-radius: 0px;">
    <div style="position: relative; top: -15px;">
    <h2 style="color: #660066; text-align: center; height: 30px; font-size: 28px;"><b>PRICE CATALOGUE</b></h2>
    <br/>
    <?php
        session_start();
        require 'dbh.php';
        $sql = "SELECT * FROM Food_Price;";
        $result = mysqli_query($conn, $sql);
        $food = mysqli_fetch_array($result);
        $sql = "SELECT * FROM Room_Rent;";
        $result = mysqli_query($conn, $sql);
        echo '<h3 style=" text-align: center; height: 30px; font-size: 23px;"><b>ROOMS PER/DAY RENT</b></h3>';
        while($row = mysqli_fetch_array($result))
        {
            echo '<p style="height: 30px; color: #673ab7; font-size: 20px; position: relative; left: 40px;"><b>'.$row["category"].': </b><span style="color: #000D6B;">₹'.$row["rent"].'</span></p>';
        }
        echo '<br/>';
        echo '<h3 style=" text-align: center; height: 30px; font-size: 23px;"><b>FOOD PRICES</b></h3>';
        echo '<p style="height: 30px; color: #673ab7; font-size: 20px; position: relative; left: 40px;"><b>Breakfast Vegitarian : </b><span style="color: #000D6B;">₹'.$food["veg_bf"].'</span></p>';
        echo '<p style="height: 30px; color: #673ab7; font-size: 20px; position: relative; left: 40px;"><b>Breakfast Non Vegitarian : </b><span style="color: #000D6B;">₹'.$food["non_veg_bf"].'</span></p>';
        echo '<p style="height: 30px; color: #673ab7; font-size: 20px; position: relative; left: 40px;"><b>Lunch Vegitarian : </b><span style="color: #000D6B;">₹'.$food["veg_lh"].'</span></p>';
        echo '<p style="height: 30px; color: #673ab7; font-size: 20px; position: relative; left: 40px;"><b>Lunch Non Vegitarian : </b><span style="color: #000D6B;">₹'.$food["non_veg_lh"].'</span></p>';
        echo '<p style="height: 30px; color: #673ab7; font-size: 20px; position: relative; left: 40px;"><b>Dinner Vegitarian : </b><span style="color: #000D6B;">₹'.$food["veg_dn"].'</span></p>';
        echo '<p style="height: 30px; color: #673ab7; font-size: 20px; position: relative; left: 40px;"><b>Dinner Non Vegitarian : </b><span style="color: #000D6B;">₹'.$food["non_veg_dn"].'</span></p>';
    ?>
    <button type="button" class="register" style="position: relative; left: 125px; top: 25px; color: black; border-radius: 5px; border: 2px solid black;" onclick="window.location.href = 'home.php'">
        <span style="position: relative; left: 0px;">back</span>
    </button>
    </div>
</div>
</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN HOME PAGE</title>
    <link rel="stylesheet" href="styles1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
    <div class="container" style=" height: 560px; width: 700px; position: relative; top: 20px; left: 0%; background-color: #E0FFFF;">
        <h2 style="color: #673ab7; text-align: center;">ADMIN OPTIONS</h2>
        <p style="position: relative; left:23px;">
        <button type="button" class="register" style="position: relative; border-radius: 5px; background: #009933; width: 297px; color: yellow; border: 2px solid yellow;" onclick="window.location.href = 'adminapplications.php'">
            <span style="position: relative;">APPLICATIONS</span>
        </button>
        <button type="button" class="register" style="position: relative; left: 30px; border-radius: 5px; background: #ff0000; width: 297px; color: #99ccff; border: 2px solid #99ccff;" onclick="window.location.href = 'availability.php'">
            <span style="position: relative;">ROOMS AVAILABILITY</span>
        </button>
        </p><br/><br/><br/><br/>
        <p style="position: relative; left:23px;">
        <button type="button" class="register" style="position: relative; border-radius: 5px; background: #ff0066; width: 297px; color: #99ccff; border: 2px solid #99ccff;" onclick="window.location.href = 'payments.php'">
            <span style="position: relative;">BILLING SECTION</span>
        </button>
        <button type="button" class="register" style="position: relative; left: 30px; border-radius: 5px; background: #6600cc; width: 297px; color: yellow; border: 2px solid yellow;" onclick="window.location.href = 'expenditure.php'">
            <span style="position: relative;">MONTHLY EXPENDITURE</span>
        </button>
        </p><br/><br/><br/><br/>   
        <p style="position: relative; left:23px;">
        <button type="button" class="register" style="position: relative; border-radius: 5px; background: #9900cc; width: 297px; color: yellow; border: 2px solid yellow;" onclick="window.location.href = 'monthlybooking.php'">
            <span style="position: relative;">MONTHLY BOOKINGS</span>
        </button>
        <button type="button" class="register" style="position: relative; left: 30px; border-radius: 5px; background: #800000; width: 297px; color: #99ccff; border: 2px solid #99ccff;" onclick="window.location.href = 'monthlybilling.php'">
            <span style="position: relative;">MONTHLY BILLINGS</span>
        </button>
        </p><br/><br/><br/><br/>
        <p style="position: relative; left:23px;">
        <button type="button" class="register" style="position: relative; border-radius: 5px; background: #cc3300; width: 297px; color: #99ccff; border: 2px solid #99ccff;" onclick="window.location.href = 'updatefood.php'">
            <span style="position: relative;">UPDATE FOOD PRICES</span>
        </button>
        <button type="button" class="register" style="position: relative; left: 30px; border-radius: 5px; background: #336600; width: 297px; color: yellow; border: 2px solid yellow;" onclick="window.location.href = 'updateroom.php'">
            <span style="position: relative;">UPDATE ROOM PRICES</span>
        </button>
        </p><br/><br/><br/><br/>
    </div>
    <button type="button" class="register" style="position: relative; left: 42%; top: -40px; border-radius: 5px; background: #ff5722; color: black; border: 2px solid black;" onclick="window.location.href = 'logout.php'">
            <span style="position: relative; left: 0px;">SIGN OUT</span>
    </button>
</body>
</html>
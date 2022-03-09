<?php
session_start();
require 'dbh.php';
require 'functions.php';
if(isset($_POST["submit"]))
{
    $purpose = $_POST["purpose"];
    //echo $purpose;
    $arrival_date = $_POST["arrival_date"];
    //echo $arrival_date;
    $departure_date = $_POST["departure_date"];
    //echo $departure_date;
    $category = $_POST["category"];
    //echo $category;
    $no_of_guests = $_POST["no_of_guests"];
    //echo $no_of_guests;
    $guest_name_1 = $_POST["guest_name_1"];
    //echo $guest_name_1;
    $guest_designation_1 = $_POST["guest_designation_1"];
    //echo $guest_designation_1;
    $guest_contact_1 = $_POST["guest_contact_1"];
    //echo $guest_contact_1;
    $guest_email_1 = $_POST["guest_email_1"];
    //echo $guest_email_1;
    $guest_name_2 = $_POST["guest_name_2"];
    //echo $guest_name_2;
    $guest_designation_2 = $_POST["guest_designation_2"];
    //echo $guest_designation_2;
    $guest_contact_2 = $_POST["guest_contact_2"];
    //echo $guest_contact_2;
    $guest_email_2 = $_POST["guest_email_2"];
    //echo $guest_email_2;
    $flat_street_no = $_POST["flat_street_no"];
    //echo $flat_street_no;
    $city = $_POST["city"];
    //echo $city;
    $state = $_POST["state"];
    //echo $state;
    $pincode = $_POST["pincode"];
    //echo $pincode;
    $payment_by = $_POST["payment_by"];
    //echo $payment_by;
    $veg_bf = $_POST["veg_bf"];
    //echo $veg_bf;
    $veg_lh = $_POST["veg_lh"];
    //echo $veg_lh;
    $veg_dn = $_POST["veg_dn"];
    //echo $veg_dn;
    $non_veg_bf = $_POST["non_veg_bf"];
    //echo $non_veg_bf;
    $non_veg_lh = $_POST["non_veg_lh"];
    //echo $non_veg_lh;
    $non_veg_dn = $_POST["non_veg_dn"];
    //echo $non_veg_dn;
    $sql = "SELECT COUNT(*) FROM Application;";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));
    $cnt = $row["COUNT(*)"];
    $application_id = get_id($cnt);
    //echo $application_id;
    $sql = "SELECT COUNT(*) FROM Guest_Details;";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));
    $gcnt = $row["COUNT(*)"];
    $guest_id = get_id($gcnt);
    //echo $guest_id;
    $status = "PENDING";
    //echo $status;
    $user_id = $_SESSION["user_id"];
    $sql1 = "INSERT INTO Application VALUES ('$application_id', '$user_id', '$no_of_guests', '$status', '$category', NULL, '$arrival_date', '$departure_date', '$purpose', '$payment_by',NOW());";
    $sql2 = "INSERT INTO Guest_Details VALUES ('$application_id', '$guest_id', '$guest_name_1', '$guest_designation_1', '$guest_contact_1', '$guest_email_1', '$flat_street_no', '$city', '$state', '$pincode' );";
    $sql3 = "INSERT INTO Food_Order VALUES ('$application_id', '$veg_bf', '$veg_lh', '$veg_dn', '$non_veg_bf', '$non_veg_lh', '$non_veg_dn');";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_query($conn, $sql3);
    // if($result1)
    // {
    //     echo "result1";
    // }
    // if($result2)
    // {
    //     echo "result2";
    // }
    // if($result3)
    // {
    //     echo "result3";
    // }
    if($result1 and $result2 and $result3)
    {
        if($no_of_guests == 2)
        {
            $gcnt++;
            $guest_id = get_id($gcnt);
            $sql4 = "INSERT INTO Guest_Details VALUES ('$application_id', '$guest_id', '$guest_name_2', '$guest_designation_2', '$guest_contact_2', '$guest_email_2', '$flat_street_no', '$city', '$state', '$pincode' );";
            $result4 = mysqli_query($conn, $sql4);
        }
        $strn = "location: display.php?application_id=" + $application_id;
        header($strn);
    }
    else
    {
        echo "<p style='color; red; text-align: center;'>Sorry, Something went wrong! Try again.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPLICATION</title>
    <link rel="stylesheet" href="styles.css">
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
<div class="container" style="background-color: #90E0EF; position: relative; left: 170px; top: 5px; width: 1200px; height: 675px;">
    <h3 style="color: #673ab7; text-align: center;">GUEST HOUSE APPLICATION FORM</h3>
    <br/>
    <form action="" method="post">
        <input type="text" class="email" name="purpose" placeholder="visit purpose*" style="display: inline; float: left; width: 180px; position: relative; left:60px;" list="drop">
        <datalist id="drop">
            <option value='PERSONAL'>
            <option value='OFFICIAL'>
        </datalist>
        <input placeholder="arrival date*" name="arrival_date" class="email" type="text" onfocus="(this.type='date')" style="display: inline; float: left; position: relative; left:83px; width: 150px;">
        <input type="text" class="email" name="departure_date"placeholder="departure date*" onfocus="(this.type='date')" style="display: inline; float: left; position: relative; left: 108px; width: 175px;">
        <input type="text" class="email" name="category" placeholder="accomodation type*" style="display: inline; width: 220px; position: relative; left:133px;" list="dropd">
        <datalist id="dropd">
            <option value='ATTACHED BATHROOM'>
            <option value='NON ATTACHED BATHROOM'>
        </datalist>
        <input type="number" class="email" name="no_of_guests" placeholder="No. of persons*" style="display: inline; width: 220px; position: relative; left:153px;" list="dope">
        <datalist id="dope">
            <option value=1>
            <option value=2>
        </datalist>
        <br/><br/>
        <h3 style="color: #673ab7; text-align: left; position: relative; left: 60px;">VISITOR-1 DETAILS</h3>
        <input type="text" class="email" name="guest_name_1" placeholder="name*" style="display: inline; float: left; width: 180px; position: relative; left:60px;">
        <input placeholder="designation*" name="guest_designation_1"class="email" type="text" style="display: inline; float: left; position: relative; left:83px; width: 150px;">
        <input type="text" class="email" name="guest_contact_1" placeholder="contact no*" style="display: inline; float: left; position: relative; left: 108px; width: 175px;">
        <input type="email" class="email" name="guest_email_1" placeholder="email*" style="display: inline; width: 220px; position: relative; left:133px;">
        <br/><br/>
        <h3 style="color: #673ab7; text-align: left; position: relative; left: 60px;">VISITOR-2 DETAILS</h3>
        <input type="text" class="email" name="guest_name_2" placeholder="name" style="display: inline; float: left; width: 180px; position: relative; left:60px;">
        <input placeholder="designation" name="guest_designation_2" purpose" class="email" type="text" style="display: inline; float: left; position: relative; left:83px; width: 150px;">
        <input type="text" class="email" name="guest_contact_2" placeholder="contact no" style="display: inline; float: left; position: relative; left: 108px; width: 175px;">
        <input type="email" class="email" name="guest_email_2" placeholder="email" style="display: inline; width: 220px; position: relative; left:133px;">
        <br/><br/>
        <h3 style="color: #673ab7; text-align: left; position: relative; left: 60px;">GUEST ADDRESS</h3>
        <input type="text" class="email" name="flat_street_no" placeholder="flat/street no*" style="display: inline; float: left; width: 180px; position: relative; left:60px;">
        <input placeholder="city*" name="city" class="email" type="text" style="display: inline; float: left; position: relative; left:83px; width: 150px;">
        <input type="text" class="email" name="state" placeholder="state*" style="display: inline; float: left; position: relative; left: 108px; width: 175px;">
        <input type="text" class="email" name="pincode" placeholder="pin*" style="display: inline; width: 220px; position: relative; left:133px;">
        <input type="text" class="email" name="payment_by" placeholder="payment by*" style="display: inline; width: 220px; position: relative; left:153px;" list="dropl">
        <datalist id="dropl">
            <option value='INSTITUTE'>
            <option value='PROJECT FUND'>
            <option value='INDENTOR'>  
            <option value='GUEST'>
        </datalist>
        <br/><br/>
        <h3 style="color: #673ab7; text-align: left; position: relative; left: 60px;">FOOD BOOKING</h3>
        <input type="number" class="email" name="veg_bf" placeholder="no of veg breakfast*" style="display: inline; float: left; width: 255px; position: relative; left:60px;">
        <input placeholder="no of veg lunch*" name="veg_lh" class="email" type="number" style="display: inline; float: left; position: relative; left:83px; width: 255px;">
        <input type="number" class="email" name="veg_dn" placeholder="no of veg dinner*" style=" position: relative; right: 113px; width: 250px;">
        <input type="number" class="email" name="non_veg_bf" placeholder="no of non veg breakfast*" style="display: inline; float: left; width: 255px; position: relative; left:60px;">
        <input placeholder="no of non veg lunch*" name="non_veg_lh" class="email" type="number" style="display: inline; float: left; position: relative; left:83px; width: 255px;">
        <input type="number" class="email" name="non_veg_dn"placeholder="no of non veg dinner*" style=" position: relative; right: 113px; width: 250px;">
        <br/><br/>
        <button type="button" class="register" style="position: relative; left: 300px; border-radius: 5px; border: 2px solid black; color: black;" onclick="window.location.href = 'booking.php'">
            <span style="position: relative; left: 0px;">back</span>
        </button>
        <button class="signin" type="submit" name="submit" style="position: relative; left: 450px; border-radius: 5px; border: 2px solid black; color: black;">
            <span style="position: relative; left: 0px;">submit</span>
        </button>
    </form>
    <div class="reg"></div>
    <div class="sig"></div>

    
    
    </div>



</body>
</html>
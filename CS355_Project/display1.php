<?php 
session_start();
require 'dbh.php';
$_SESSION["application_id"] = $_GET["application_id"];
$application_id = $_SESSION["application_id"];
$sql = "SELECT * FROM Application WHERE application_id = '$application_id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$_SESSION["purpose"] = $row["purpose"];
$_SESSION["arrival_date"] = $row["arrival_date"];
$_SESSION["departure_date"] = $row["departure_date"];
$_SESSION["no_of_guests"] = $row["no_of_guests"];
$_SESSION["status"] = $row["status"];
$_SESSION["category"] = $row["category"];
$_SESSION["payment_by"] = $row["payment_by"];
$sql = "SELECT * FROM Food_Order WHERE application_id = '$application_id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$_SESSION["veg_bf"] = $row["veg_bf"];
$_SESSION["veg_lh"] = $row["veg_lh"];
$_SESSION["veg_dn"] = $row["veg_dn"];
$_SESSION["non_veg_bf"] = $row["non_veg_bf"];
$_SESSION["non_veg_lh"] = $row["non_veg_lh"];
$_SESSION["non_veg_dn"] = $row["non_veg_dn"];
$var = 0;
$sql = "SELECT * FROM Guest_Details WHERE application_id = '$application_id';";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
    if($var === 0)
    {
        $_SESSION["flat_street_no"] = $row["flat_street_no"];
        $_SESSION["city"] = $row["city"];
        $_SESSION["state"] = $row["state"];
        $_SESSION["pincode"] = $row["pincode"];
        $_SESSION["guest_name_1"] = $row["guest_name"];
        $_SESSION["guest_designation_1"] = $row["guest_desg"];
        $_SESSION["guest_contact_1"] = $row["guest_ph"];
        $_SESSION["guest_email_1"] = $row["email"];
    }
    else
    {
        $_SESSION["guest_name_2"] = $row["guest_name"];
        $_SESSION["guest_designation_2"] = $row["guest_desg"];
        $_SESSION["guest_contact_2"] = $row["guest_ph"];
        $_SESSION["guest_email_2"] = $row["email"];
    }
    $var++;
}
$sql = "SELECT user_id FROM Application WHERE application_id = '$application_id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$_SESSION["id"] = $row["user_id"];
$user = $row["user_id"];
$sql = "SELECT * FROM IITP_User WHERE user_id = '$user';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$_SESSION["desg"] = $row["designation"];
$_SESSION["ph"] = $row["phone"];
$_SESSION["em"] = $row["email"];
$_SESSION["dept"] = $row["department"];
$_SESSION["user_name"] = $row["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPLICATION</title>
    <link rel="stylesheet" href="rstyles.css">
    <script src="effects.js"></script>
</head>
<body style="background-color: #0077B6;">
<div class="" style="background-color: #90E0EF; position: relative; left: 170px; top: 5px; width: 1200px; height: 950px;">
    <h3 style="color: #673ab7; text-align: center;">APPLICATION DETAILS</h3>
    <br/>
    <p style=""><span style="position: relative; left: 50px;">Application ID : <input type="text" value="<?php echo $_SESSION['application_id'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Application Status : <input type="text" value="<?php echo $_SESSION['status'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 150px;">Purpose of visit : <input type="text" value="<?php echo $_SESSION['purpose']?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <p style=""><span style="position: relative; left: 50px;">No. of Persons : <input type="text" value="<?php echo $_SESSION['no_of_guests'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Date of Arrival    : <input type="text" value="<?php echo $_SESSION['arrival_date'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 150px;">Date of Departure : <input type="text" value="<?php echo $_SESSION['departure_date'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <p style=""><span style="position: relative; left: 50px;">Accomodation Type : <input type="text" value="<?php echo $_SESSION['category'];?>" style="width: 225px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Payment by : <input type="text" value="<?php echo $_SESSION['payment_by']?>" style="width: 200px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <h4 style="color: #673ab7; text-align: left; position:relative; left: 50px;">GUEST ADDRESS</h4><br/>
    <p style=""><span style="position: relative; left: 50px;">Flat/Apt/Street No : <input type="text" value="<?php echo $_SESSION['flat_street_no'];?>" style="width: 325px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">City : <input type="text" value="<?php echo $_SESSION['city'];?>" style="width: 200px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <p style=""><span style="position: relative; left: 50px;">State : <input type="text" value="<?php echo $_SESSION['state'];?>" style="width: 225px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Pin Code : <input type="text" value="<?php echo $_SESSION['pincode'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <h4 style="color: #673ab7; text-align: left; position:relative; left: 50px;">GUEST INFO</h4><br/>
    <p style=""><span style="position: relative; left: 50px;">Guest/Visitor-1 Name : <input type="text" value="<?php echo $_SESSION['guest_name_1'];?>" style="width: 250px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Guest/Visitor-1 Designation : <input type="text" value="<?php echo $_SESSION['guest_designation_1'];?>" style="width: 250px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <p style=""><span style="position: relative; left: 50px;">Guest/Visitor-1 Phone : <input type="text" value="<?php echo $_SESSION['guest_contact_1'];?>" style="width: 250px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Guest/Visitor-1 Email : <input type="text" value="<?php echo $_SESSION['guest_email_1'];?>" style="width: 250px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <p style=""><span style="position: relative; left: 50px;">Guest/Visitor-2 Name : <input type="text" value="<?php echo $_SESSION['guest_name_2'];?>" style="width: 250px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Guest/Visitor-2 Designation : <input type="text" value="<?php echo $_SESSION['guest_designation_2'];?>" style="width: 250px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <p style=""><span style="position: relative; left: 50px;">Guest/Visitor-2 Phone : <input type="text" value="<?php echo $_SESSION['guest_contact_2'];?>" style="width: 250px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Guest/Visitor-2 Email : <input type="text" value="<?php echo $_SESSION['guest_email_2'];?>" style="width: 250px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <h4 style="color: #673ab7; text-align: left; position:relative; left: 50px;">NOS OF FOOD TYPE</h4><br/>
    <p style=""><span style="position: relative; left: 50px;">Veg Breakfast : <input type="text" value="<?php echo $_SESSION['veg_bf'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Veg Lunch : <input type="text" value="<?php echo $_SESSION['veg_lh'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 150px;">Veg Dinner : <input type="text" value="<?php echo $_SESSION['veg_dn'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <p style=""><span style="position: relative; left: 50px;">Non-Veg Breakfast : <input type="text" value="<?php echo $_SESSION['non_veg_bf'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Non-Veg Lunch : <input type="text" value="<?php echo $_SESSION['non_veg_lh'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 150px;">Non-Veg Dinner : <input type="text" value="<?php echo $_SESSION['non_veg_dn'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <h4 style="color: #673ab7; text-align: left; position:relative; left: 50px;">INDENTOR INFO</h4><br/>
    <p style=""><span style="position: relative; left: 50px;">Institute ID : <input type="text" value="<?php echo $_SESSION['id'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Indentor Name : <input type="text" value="<?php echo $_SESSION['user_name'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 150px;">Designation : <input type="text" value="<?php echo $_SESSION['desg'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/>
    <p style=""><span style="position: relative; left: 50px;">Department : <input type="text" value="<?php echo $_SESSION['dept'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 100px;">Phone : <input type="text" value="<?php echo $_SESSION['ph'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span><span style="position: relative; left: 150px;">Email : <input type="text" value="<?php echo $_SESSION['em'];?>" style="width: 175px; height: 25px; border-radius: 5px; border: 2px solid white; font-size: 16px;" readonly></span></p><br/><br/><br/>
    <p style="position: relative; left: 50px; color: brown;">Countersignature of the concerned HOD/HOS (in case the purpose of visit is official)<span style="position: relative; left: 132px;">Signature of the Indentor with date</span></p><br/><br/>
    <p style="position: relative; left: 50px; color: brown;">Approval of the Registrar/Director <span style="position: relative; left: 485px;">Signature of Incharge Guest House with Date</span></p>
    <br/><br/>
    <button type="button" class="register" style="position: relative; left: 485px; width: 200px; height: 50px; border-radius: 5px; border: 2px solid black; color: black;" onclick="window.location.href = 'adminapplications.php'">
        <span style="position: relative; left: 0px;">back</span>
    </button>
    <!-- <button class="signin"  style="position: relative; left: 450px;">
        <span style="position: relative; left: 0px;">submit</span>
    </button> -->
</div>



</body>
</html>
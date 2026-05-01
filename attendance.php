<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

$emp_id = $_SESSION['user_id'];
$date = date("Y-m-d");
$time = date("H:i:s");

// Check if attendance already exists for today
$check = mysqli_query($conn, "SELECT * FROM attendance 
                              WHERE employee_id='$emp_id' AND date='$date'");

$row = mysqli_fetch_assoc($check);

// Check In
if(isset($_POST['checkin'])){
    if(mysqli_num_rows($check) == 0){
        mysqli_query($conn,"INSERT INTO attendance(employee_id,date,check_in)
                            VALUES('$emp_id','$date','$time')");
        echo "Check-In Successful";
    } else {
        echo "Already Checked In Today";
    }
}

// Check Out
if(isset($_POST['checkout'])){
    if($row && $row['check_out'] == NULL){
        mysqli_query($conn,"UPDATE attendance 
                            SET check_out='$time' 
                            WHERE employee_id='$emp_id' AND date='$date'");
        echo "Check-Out Successful";
    } else {
        echo "Check-Out Already Done";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Attendance</title>
</head>
<body>

<h1>Mark Attendance</h1>

<form method="POST">
    <button name="checkin">Check In</button>
    <button name="checkout">Check Out</button>
</form>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>

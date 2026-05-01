<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

$emp_id = $_SESSION['user_id'];

if(isset($_POST['apply'])){
    $from = $_POST['from_date'];
    $to = $_POST['to_date'];
    $reason = $_POST['reason'];

    mysqli_query($conn,"INSERT INTO leaves(employee_id,from_date,to_date,reason,status)
                        VALUES('$emp_id','$from','$to','$reason','Pending')");

    echo "Leave Applied Successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply Leave</title>
</head>
<body>

<h1>Apply Leave</h1>

<form method="POST">
From Date: <input type="date" name="from_date" required><br><br>
To Date: <input type="date" name="to_date" required><br><br>
Reason:<br>
<textarea name="reason" required></textarea><br><br>

<button name="apply">Apply Leave</button>
</form>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>

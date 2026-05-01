<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
</head>
<body>

<h1>Welcome Employee</h1>

<a href="attendance.php">Mark Attendance</a><br><br>
<a href="apply_leave.php">Apply Leave</a><br><br>
<a href="profile.php">Profile</a><br><br>
<a href="../logout.php">Logout</a>

</body>
</html>

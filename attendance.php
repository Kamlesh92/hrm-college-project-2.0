<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$query = mysqli_query($conn,"
    SELECT attendance.id, users.name, attendance.date, attendance.check_in, attendance.check_out
    FROM attendance
    INNER JOIN users ON attendance.employee_id = users.id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Records</title>
</head>
<body>

<h1>Attendance Records</h1>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Employee Name</th>
    <th>Date</th>
    <th>Check In</th>
    <th>Check Out</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['check_in']; ?></td>
    <td><?php echo $row['check_out']; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>

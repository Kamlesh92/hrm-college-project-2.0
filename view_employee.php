<?php
session_start();
include("../config/db.php");

// Check if admin logged in
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

// Fetch employees with user details
$query = mysqli_query($conn,"
    SELECT users.id, users.name, users.email, employees.department, employees.salary 
    FROM users 
    INNER JOIN employees 
    ON users.id = employees.user_id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Employees</title>
</head>
<body>

<h1>Employee List</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Salary</th>
    </tr>

    <?php
    while($row = mysqli_fetch_assoc($query)){
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['salary']; ?></td>
    </tr>
    <?php
    }
    ?>

</table>

<br><br>
<a href="dashboard.php">Back to Dashboard<

<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

$emp_id = $_SESSION['user_id'];

// Fetch employee data
$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$emp_id'");

if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);
} else {
    echo "User not found!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Profile</title>
</head>
<body>

<h1>My Profile</h1>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <td><?php echo $user['name'] ?? 'N/A'; ?></td>
</tr>

<tr>
    <th>Email</th>
    <td><?php echo $user['email']; ?></td>
</tr>

<tr>
    <th>Role</th>
    <td><?php echo $user['role']; ?></td>
</tr>
</table>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>

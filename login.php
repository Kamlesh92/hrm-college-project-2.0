<?php
session_start();
include("config/db.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        if($row['role'] == "admin"){
            header("Location: admin/dashboard.php");
        } else {
            header("Location: employee/dashboard.php");
        }
    } else {
        echo "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<form method="POST">
<h2>HRMS Login</h2>
<input type="email" name="email" placeholder="Email"><br>
<input type="password" name="password" placeholder="Password"><br>
<button name="login">Login</button>
</form>

</body>
</html>

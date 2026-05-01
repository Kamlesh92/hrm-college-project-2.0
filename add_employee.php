<?php
include("../config/db.php");

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dept = $_POST['department'];
    $salary = $_POST['salary'];

    mysqli_query($conn,"INSERT INTO users(name,email,password,role)
                        VALUES('$name','$email','$password','employee')");
    
    $user_id = mysqli_insert_id($conn);

    mysqli_query($conn,"INSERT INTO employees(user_id,department,salary)
                        VALUES('$user_id','$dept','$salary')");

    echo "Employee Added Successfully";
}
?>

<form method="POST">
<h2>Add Employee</h2>
<input type="text" name="name" placeholder="Name"><br>
<input type="email" name="email" placeholder="Email"><br>
<input type="text" name="password" placeholder="Password"><br>
<input type="text" name="department" placeholder="Department"><br>
<input type="number" name="salary" placeholder="Salary"><br>
<button name="add">Add Employee</button>
</form>

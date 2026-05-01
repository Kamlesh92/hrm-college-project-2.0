<?php
include("../config/db.php");

if(isset($_POST['generate'])){
    $emp = $_POST['employee_id'];
    $basic = $_POST['basic'];
    $da = $_POST['da'];
    $deductions = $_POST['deductions'];

    $net = ($basic + $da) - $deductions;

    mysqli_query($conn,"INSERT INTO payroll(employee_id,basic,da,deductions,net_salary,month)
                        VALUES('$emp','$basic','$da','$deductions','$net','January')");

    echo "Payroll Generated";
}
?>

<form method="POST">
<h2>Generate Payroll</h2>
<input type="number" name="employee_id" placeholder="Employee ID"><br>
<input type="number" name="basic" placeholder="Basic"><br>
<input type="number" name="da" placeholder="DA"><br>
<input type="number" name="deductions" placeholder="Deductions"><br>
<button name="generate">Generate</button>
</form>

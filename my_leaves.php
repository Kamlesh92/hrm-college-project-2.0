<?php
session_start();
include("../config/db.php");

$employee_id = $_SESSION['user_id']; // logged-in user

$query = mysqli_query($conn, "
    SELECT * FROM leaves 
    WHERE employee_id = $employee_id
");
?>

<h2>My Leave Requests</h2>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>From</th>
    <th>To</th>
    <th>Reason</th>
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)){ ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['from_date']; ?></td>
    <td><?php echo $row['to_date']; ?></td>
    <td><?php echo $row['reason']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>
<?php } ?>
</table>

<br>
<a href="dashboard.php">Back</a>

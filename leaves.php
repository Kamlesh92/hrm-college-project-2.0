<?php
include("../config/db.php");

if(isset($_GET['approve'])){
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE leaves SET status='Approved' WHERE id=$id");
    header("Location: leaves.php");
}

if(isset($_GET['reject'])){
    $id = $_GET['reject'];
    mysqli_query($conn, "UPDATE leaves SET status='Rejected' WHERE id=$id");
    header("Location: leaves.php");
}

$query = mysqli_query($conn, "
    SELECT leaves.*, users.name 
    FROM leaves 
    JOIN users ON leaves.employee_id = users.id
");
?>

<h2>Leave Requests</h2>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>From</th>
    <th>To</th>
    <th>Reason</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)){ ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['from_date']; ?></td>
    <td><?php echo $row['to_date']; ?></td>
    <td><?php echo $row['reason']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td>
        <?php if(strtolower($row['status']) == 'pending'){ ?>
            <a href="?approve=<?php echo $row['id']; ?>">Approve</a> |
            <a href="?reject=<?php echo $row['id']; ?>">Reject</a>
        <?php } else { ?>
            No Action
        <?php } ?>
    </td>
</tr>
<?php } ?>
</table>

<br>
<a href="dashboard.php">Back</a>

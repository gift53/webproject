<?php
include 'includes/db.php';
include 'includes/header.php';

$result = mysqli_query($conn,
"SELECT * FROM users ORDER BY id DESC");
?>

<div class="cart">

<h2>Registered Users</h2>

<table>

<tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Email</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)): ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['email']; ?></td>
</tr>

<?php endwhile; ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>
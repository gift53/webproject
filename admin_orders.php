<?php
include 'includes/db.php';
include 'includes/header.php';

$result = mysqli_query(
    $conn,
    "SELECT * FROM orders ORDER BY id DESC"
);
?>

<div class="cart">

<h2>Customer Orders</h2>

<table>

<tr>
    <th>Order ID</th>
    <th>Customer</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Total</th>
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)): ?>

<tr>

    <td>#<?php echo $row['id']; ?></td>

    <td><?php echo $row['customer_name']; ?></td>

    <td><?php echo $row['phone']; ?></td>

    <td><?php echo $row['address']; ?></td>

    <td>KES <?php echo $row['total']; ?></td>

    <td>
        <?php if($row['status'] == 'New'): ?>
            🔔 New Order
        <?php else: ?>
            <?php echo $row['status']; ?>
        <?php endif; ?>
    </td>

</tr>

<?php endwhile; ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>
<?php
session_start();

include 'includes/db.php';
include 'includes/header.php';

$grandTotal = 0;

/* =========================
   PLACE ORDER
========================= */
if (isset($_POST['place_order']) && !empty($_SESSION['cart'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Calculate Grand Total
    $orderTotal = 0;

    foreach ($_SESSION['cart'] as $item) {
        $orderTotal += $item['price'] * $item['qty'];
    }

    // Save Order
    $sql = "INSERT INTO orders
            (customer_name, phone, address, total)
            VALUES
            ('$name', '$phone', '$address', '$orderTotal')";

    mysqli_query($conn, $sql);

    $orderId = mysqli_insert_id($conn);

    foreach ($_SESSION['cart'] as $item) {

        $product = $item['name'];
        $price = $item['price'];
        $qty = $item['qty'];

        $sql = "INSERT INTO order_items
                (order_id, product_name, price, quantity)
                VALUES
                ('$orderId', '$product', '$price', '$qty')";

        mysqli_query($conn, $sql);
    }

    $_SESSION['cart'] = [];

    echo "<div class='checkout sucess-change'>";
    echo "<h2>Order Successful!</h2>";
    echo "<p>Thank you, <strong>$name</strong>.</p>";
    echo "<p>Your Order Number is <strong>#$orderId</strong></p>";
    echo "<p>Your order is being processed.</p>";
    echo "<br>";
    echo "<a href='index.php' class='btn'>Continue Shopping</a>";
    echo "</div>";

    include 'includes/footer.php';
    exit;
}
?>
<div class="checkout">

<h2>Checkout</h2>

<?php if (!empty($_SESSION['cart'])): ?>

<table border="1" cellpadding="10">

<tr>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
</tr>

<?php foreach ($_SESSION['cart'] as $item): ?>

<?php
$total = $item['price'] * $item['qty'];
$grandTotal += $total;
?>

<tr>
    <td><?php echo $item['name']; ?></td>
    <td>KES <?php echo $item['price']; ?></td>
    <td><?php echo $item['qty']; ?></td>
    <td>KES <?php echo $total; ?></td>
</tr>

<?php endforeach; ?>

<tr>
    <td colspan="3"><strong>Grand Total</strong></td>
    <td><strong>KES <?php echo $grandTotal; ?></strong></td>
</tr>

</table>

<form method="POST">

    <label>Full Name</label>
    <input type="text" name="name" required>

    <label>Phone Number</label>
    <input type="text" name="phone" required>

    <label>Delivery Address</label>
    <textarea name="address" required></textarea>

    <button type="submit" name="place_order" class="btn">
        Place Order
    </button>

</form>

<?php else: ?>

<p>Your cart is empty.</p>

<a href="index.php" class="btn">Continue Shopping</a>

<?php endif; ?>

</div>

<?php include 'includes/footer.php'; ?>
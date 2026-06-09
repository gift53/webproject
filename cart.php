<?php
session_start();

/* =========================
   REMOVE ITEM
========================= */
if (isset($_GET['remove'])) {

    $id = $_GET['remove'];

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }

    header("Location: cart.php");
    exit;
}

/* =========================
   ADD TO CART (MULTI ITEM)
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = $_POST['id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // if item already exists → increase qty
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty']++;
    } else {
        $_SESSION['cart'][$id] = [
            'name'  => $_POST['product'],
            'price' => $_POST['price'],
            'qty'   => 1
        ];
    }

    header("Location: cart.php");
    exit;
}

include 'includes/header.php';

$grandTotal = 0;
?>

<div class="cart">

<h2>Shopping Cart</h2>

<form method="POST">

<table border="1" cellpadding="10">

<tr>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Action</th>
</tr>

<?php if (!empty($_SESSION['cart'])): ?>

    <?php foreach ($_SESSION['cart'] as $id => $item): ?>

        <?php
            $total = $item['price'] * $item['qty'];
            $grandTotal += $total;
        ?>

        <tr>
            <td><?php echo $item['name']; ?></td>

            <td>KES <?php echo $item['price']; ?></td>

            <td>
                <input type="number"
                       name="qty[<?php echo $id; ?>]"
                       value="<?php echo $item['qty']; ?>"
                       min="1"
                       style="width:70px; text-align:center;">
            </td>

            <td>KES <?php echo $total; ?></td>

            <td>
                <a href="cart.php?remove=<?php echo $id; ?>"
                   onclick="return confirm('Remove this item?')">
                    Remove
                </a>
            </td>

        </tr>

    <?php endforeach; ?>

<?php else: ?>

    <tr>
        <td colspan="5">Your cart is empty</td>
    </tr>

<?php endif; ?>

<tr>
    <td colspan="4"><strong>Grand Total</strong></td>
    <td><strong>KES <?php echo $grandTotal; ?></strong></td>
</tr>

</table>

<br>

<button type="submit" name="update_cart" class="btn">
    Update Cart
</button>

</form>

<br>

<a href="index.php" class="btn">Continue Shopping</a>
<a href="checkout.php" class="btn">Checkout</a>

</div>

<?php include 'includes/footer.php'; ?>
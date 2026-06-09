<?php
session_start();
?>
<?php include 'includes/header.php'; ?>

<section class="hero">
    <h1>Welcome to ShopEasy</h1>
    <p>Your One-Stop Online Shopping Platform</p>
</section>

<section class="products">

    <div class="card">
        <img src="assets/images/wireless headphones.jfif" alt="Wireless Headphones">
        <h3>Wireless Headphones</h3>
        <p>KES 2,500</p>
        <form action="cart.php" method="POST">
    <input type="hidden" name="id" value="1">         
    <input type="hidden" name="product" value="Wireless Headphones">
    <input type="hidden" name="price" value="2500">
    <button type="submit" class="btn">Add to Cart</button>
</form>
    </div>    

    <div class="card">
        <img src="assets/images/smartphone.jfif" alt="smart watch">
        <h3>Smart Watch</h3>
        <p>KES 4,000</p>
        <form action="cart.php" method="POST">
    <input type="hidden" name="id" value="2">        
    <input type="hidden" name="product" value="Smart Watch">
    <input type="hidden" name="price" value="4000">
    <button type="submit" class="btn">Add to Cart</button>
</form>
    </div>

    <div class="card">
        <img src="assets/images/bluetooth.jfif" alt="bluetooth speaker">
        <h3>Bluetooth Speaker</h3>
        <p>KES 3,500</p>
        <form action="cart.php" method="POST">
    <input type="hidden" name="id" value="3">       
    <input type="hidden" name="product" value="Bluetooth Speaker">
    <input type="hidden" name="price" value="3500">
    <button type="submit" class="btn">Add to Cart</button>
</form>
    </div>

    <div class="card">
        <img src="assets/images/laptop.jfif">
        <h3>laptop</h3>
        <p>KES 55,000</P>
        <form action="cart.php" method="POST">
    <input type="hidden" name="id" value="4">
    <input type="hidden" name="product" value="Laptop">
    <input type="hidden" name="price" value="55000">
    <button type="submit" class="btn">Add to Cart</button>
</form>
    </div>    
</section>

<?php include 'includes/footer.php'; ?>
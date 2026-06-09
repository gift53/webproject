<?php
session_start();
include 'includes/header.php';
?>

<div class="dashboard">

    <h2>Admin Dashboard</h2>

    <div class="dashboard-grid">

        <div class="dashboard-card">
            <h3>Product Management</h3>
            <p>Create and manage products.</p>
            <a href="index.php" class="btn">View Products</a>
        </div>

        <div class="dashboard-card">
            <h3>Customer Orders</h3>
            <p>View all orders placed.</p>
            <a href="admin_orders.php" class="btn">View Orders</a>
        </div>

        <div class="dashboard-card">
            <h3>Registered Users</h3>
            <p>View registered customers.</p>
            <a href="admin_users.php" class="btn">View Users</a>
        </div>

        <div class="dashboard-card">
            <h3>Sales Report</h3>
            <p>Track sales and revenue.</p>
            <a href="#" class="btn">Reports</a>
        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>
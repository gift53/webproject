<?php
session_start();

include 'includes/db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['fullname'];

            header("Location: index.php");
            exit;

        } else {

            $message = "Invalid password.";
        }

    } else {

        $message = "Email not found.";
    }
}

include 'includes/header.php';
?>

<div class="login-container">

    <h2>Login</h2>

    <?php if (!empty($message)) : ?>
        <p style="color:red; text-align:center;">
            <?php echo $message; ?>
        </p>
    <?php endif; ?>

    <form method="POST">

        <input
            type="email"
            name="email"
            placeholder="Enter Email"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Enter Password"
            required
        >

        <button type="submit" class="btn">
            Login
        </button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>
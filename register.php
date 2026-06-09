<?php
session_start();

include 'includes/db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check passwords match
    if ($password != $confirm_password) {

        $message = "Passwords do not match.";

    } else {

        // Check if email already exists
        $check = mysqli_query(
            $conn,
            "SELECT * FROM users WHERE email='$email'"
        );

        if (mysqli_num_rows($check) > 0) {

            $message = "Email already registered.";

        } else {

            // Encrypt password
            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            // Insert user
            $sql = "INSERT INTO users
                    (fullname, email, password)
                    VALUES
                    ('$fullname', '$email', '$hashedPassword')";

            if (mysqli_query($conn, $sql)) {

                header("Location: login.php");
                exit;

            } else {

                $message = "Registration failed.";
            }
        }
    }
}

include 'includes/header.php';
?>

<div class="register-container">

    <h2>Create Account</h2>

    <?php if (!empty($message)) : ?>
        <p style="color:red; text-align:center;">
            <?php echo $message; ?>
        </p>
    <?php endif; ?>

    <form method="POST">

        <input
            type="text"
            name="fullname"
            placeholder="Full Name"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Email Address"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <input
            type="password"
            name="confirm_password"
            placeholder="Confirm Password"
            required
        >

        <button type="submit" class="btn">
            Register
        </button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>
<?php
// Include database connection
include 'config/db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - Laptop Shop</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="login-background"></div>
            <div class="login-form">
                <div class="login-title">Laptop Shop</div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h4>Create Your Account</h4>

                    <div class="login-side">

                        <div class="login-input">
                            <span>Full Name</span>
                            <input type="text" name="fullname" required>
                        </div>

                        <div class="login-input">
                            <span>Email</span>
                            <input type="email" name="email" required>
                        </div>

                        <div class="login-input">
                            <span>Password</span>
                            <input type="password" name="password" required>
                        </div>

                        <div class="login-input">
                            <span>Phone</span>
                            <input type="text" name="phone">
                        </div>

                        <div class="login-input">
                            <span>Address</span>
                            <input type="text" name="address">
                        </div>

                    </div>

                    <input type="submit" value="Register" class="submit">

                    <div class="register-side">
                        <span>Already have an account?</span>
                        <a href="login.php">Login</a>
                    </div>

                    <?php 
                    if (!empty($error)) {
                        echo "<span class='error'>$error</span>";
                    }
                    ?>

                </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    // Mã hoá mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname, email, password, phone, address, role) 
            VALUES (?, ?, ?, ?, ?, 'user')";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $fullname, $email, $hashed_password, $phone, $address);

        if ($stmt->execute()) {
            header("Location: login.php?success=1");
            exit();
        } else {
            $error = "Failed to register!";
        }

        $stmt->close();
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

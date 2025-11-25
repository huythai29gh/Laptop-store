<?php
// Include database connection
include 'config/db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Laptop Shop</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="login-background">
            </div>
            <div class="login-form">
                <div class="login-title">Laptop Shop</div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h4>Welcome to Laptop Shop</h4>
                    <div class="login-side">
                        <div class="login-input">
                            <span>Email</span>
                            <input type="text" name="email" id="" required>
                        </div>
                        <div class="login-input">
                            <span>Password</span>
                            <input type="password" name="password" id="" required>
                        </div>
                    </div>
                    <input type="submit" value="Sign in" class="submit">
                    <div class="register-side">
                        <span>New Haerin's member?</span><a href="register.php">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Prepare the SQL statement
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ss", $email, $password);
        
        // Execute the statement
        $stmt->execute();
        
        // Get result
        $result = $stmt->get_result();
        $rows = $result->fetch_assoc();
        
        if ($rows) {
            $_SESSION["user_id"] = $rows['user_id'];
            $_SESSION["fullname"] = $rows['fullname'];
            $_SESSION["email"] = $rows['email'];
            $_SESSION["role"] = $rows['role'];
            
            header("Location: index.php");
            exit();
        } else {
            $error = "Wrong username or password!";
        }
        $stmt->close();
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

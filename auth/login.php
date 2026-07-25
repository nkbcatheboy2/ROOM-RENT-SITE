<?php
include '../config/db.php';
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Admin Hardcoded Login check
    if ($email == "admin@rental.com" && $password == "admin123") {
        $_SESSION['admin_logged'] = true;
        header("Location: ../admin/dashboard.php");
        exit();
    } else {
        $result = $conn->query("SELECT * FROM users WHERE email='$email'");
        if($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])) {
                $_SESSION['user_logged'] = true;
                $_SESSION['user_name'] = $user['name'];
                header("Location: ../index.php");
                exit();
            } else {
                $error = "Incorrect Password!";
            }
        } else {
            $error = "Email not found!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>body { background: #f1f5f9; height: 100vh; display: flex; align-items: center; justify-content: center; }</style>
</head>
<body>
    <div class="card p-4 bg-white shadow-sm border-0 rounded-4" style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary"><i class="fas fa-city me-2"></i>UrbanNest</h3>
            <p class="text-muted small">Sign in to your account</p>
        </div>

        <?php if (!empty($error)): ?><div class="alert alert-danger py-2 small"><?php echo $error; ?></div><?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label small fw-bold">Email Address</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow-sm">Login</button>
        </form>

        <div class="text-center mt-3">
            <p class="small text-muted">Don't have an account? <a href="register.php" class="text-primary fw-bold text-decoration-none">Register</a></p>
            <a href="../index.php" class="small text-secondary text-decoration-none"><i class="fas fa-arrow-left me-1"></i> Back to Home</a>
        </div>
    </div>
</body>
</html>
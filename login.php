<?php
require_once 'config.php';
require_once 'auth.php';

if (isLoggedIn()) {
    redirect(isAdmin() ? 'admin_dashboard.php' : 'customer_dashboard.php');
}

$auth = new Auth();
$error = '';

if ($_POST) {
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];
    
    $result = $auth->login($username, $password);

    if ($result === 'success') {
        // Optional redirect-after-login logic
        if (!empty($_SESSION['redirect_after_login'])) {
            $path = $_SESSION['redirect_after_login'];
            unset($_SESSION['redirect_after_login']);
            redirect($path);
        }

        redirect(isAdmin() ? 'admin_dashboard.php' : 'customer_dashboard.php');
    } elseif ($result === 'account_suspended') {
        $error = 'Your account has been suspended. Please contact administrator.';
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<header class="header">
    <div class="header-left"></div>
    <div class="header-middle"></div>
    <div class="header-right"></div>
</header>

<div class="divider"></div>

<div class="container">

    <?php if ($error): ?>
        <div class="error-box"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" class="login-form">

        <div class="input-box">
            <input type="text" name="username" placeholder="Email" required>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="btn">Proceed</button>

        <a href="register.php" class="link">New Customer? Create your Account</a>
        <a href="forgot_password.php" class="link">Lost password? Recover Password</a>

    </form>

</div>

</body>
</html>

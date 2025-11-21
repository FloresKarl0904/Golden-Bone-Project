<?php
session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email    = $_POST["email"];
    $password = $_POST["password"];

    $database = new Database();
    $db = $database->connect();

    $query = $db->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);

    if ($query->rowCount() == 1) {

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["firstname"] = $user["firstname"];
            header("Location: dashboard.php");
            exit;
        }
    }

    echo "<script>alert('Invalid email or password'); window.location.href='index.php';</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Golden Bone Salon</title>
<link rel="stylesheet" href="assets/css/endex.css">
<script src="./functions/Javascript/popup.js" defer></script>
</head>
<body>

<img class="dog-image" src="./images/dogs.png">

<div class="container">

    <img class="img-size" src="./images/DdogSalon.png" alt="Title :D"><br>
    <p1 style="font-size: 20px; text-align: left; color: black; font-weight: bold;">Comitted to providing safe,<br> high-quality grooming in a clean<br> and professional environment</p1><br>
    <br>
    <button class="btn" id="openBtn" onclick="openPopup()">Book your Appointment now →</button>

    <div id="popup" class="popup">
    <img class="backbtn" id="closeBtn" onclick="closePopup()" src="./images/backbutton.png">

    <form action="index.php" method="POST">
        <input class="formDesign" type="email" id="email" name="email" placeholder="Email(e.g. account@example.com)" required>
        <input class="formDesign" type="password" id="password" name="password" placeholder="Password(e.g. 12345) " required>
        <button class="loginBtn" type="submit" id="close-sumbitBtn">Login</button>
    </form>

    <a class="forgotpword" href="test.html">Forgot Password?</a>
    <a class="newAccount" href="register.php">Don't have an account? Create One!</a>
    
    </div>

</div>

</body>
</html>
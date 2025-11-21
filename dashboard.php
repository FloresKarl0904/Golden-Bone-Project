<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Golden Bone Salon</title>
<link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>

<header>
    <img src="./images/logov2.png" class="logo">

    <nav>
        <a href="#" class="active">Home</a>
        <a href="gallery.php">Gallery</a>
        <a href="pricing.php">Pricing</a>
        <a href="#">Review</a>
        <a href="#">Products</a>
        <a href="#">Support</a>
        <a href="about.php">About</a>
        <a href="#">Contact</a>
        <div class="nav-icon"></div>
    </nav>
</header>

<img class="dog-image" src="./images/dogs.png">

<div class="container">

    <img class="img-size" src="./images/DdogSalon.png" alt="Title :D"><br>
    <p1 style="font-size: 15px; text-align: left; color: black; font-weight: bold;">Welcome to Golden Bone Dog Salon,<br>Where your fur babies are treaded with the<br>love, comfort, and premium care they deserve.<br>We're here to give them a<br>relaxing, safe, and golden<br>grooming experience.</p1><br>
    <br>
    <button class="btn" id="openBtn" onclick="window.location.href='booking.php'">You can now book your schedule →</button>

    

</div>

</body>
</html>

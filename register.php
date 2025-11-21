<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["firstname"];
    $lastname  = $_POST["lastname"];
    $email     = $_POST["email"];
    $password  = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $database = new Database();
    $db = $database->connect();

    // Check if email already exists
    $check = $db->prepare("SELECT * FROM users WHERE email = ?");
    $check->execute([$email]);

    if ($check->rowCount() > 0) {
        echo "<script>alert('Email already registered!'); window.location.href='register.php';</script>";
        exit;
    }

    // Insert new user
    $query = $db->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");

    if ($query->execute([$firstname, $lastname, $email, $password])) {
        echo "<script>alert('Account created successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Registration failed. Try again.'); window.location.href='register.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>

<img class="dog-image" src="./images/dogs.png">

<div class="container">

    <img class="img-size" src="./images/DdogSalon.png" alt="Title :D"><br>
    <p1 style="font-size: 20px; text-align: left; color: black; font-weight: bold;">Comitted to providing safe,<br> high-quality grooming in a clean<br> and professional environment</p1><br>
    <br>
    <button class="btn" id="openBtn">Book your Appointment now →</button>

    <div id="popup" class="popup">
    <img class="backbtn" id="closeBtn" onclick="window.location.href='index.php'" src="./images/backbutton.png">

    <form action="register.php" method="POST">
        <input class="formDesign" type="text" id="firstname" name="firstname" placeholder="First Name" required>
        <input class="formDesign" type="text" id="lastname" name="lastname" placeholder="Last Name" required>
        <input class="formDesign" type="email" id="email" name="email" placeholder="Email(e.g. account@example.com)" required>
        <input class="formDesign" type="password" id="password" name="password" placeholder="Password(e.g. 12345) " required>
        <input class="checkbox"  type="checkbox" id="myCheckbox" name="option 1" value="yes" required>
        <label class="checkboxtext" for="myCheckbox">Terms & Conditions</label>
        <button class="loginBtn" type="submit" id="close-sumbitBtn">Create Account</button>
    </form>
 
    
    </div>

</div>






</body>
</html>

<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Appointment - Golden Bone Salon</title>
<link rel="stylesheet" href="assets/css/booking.css">
<script src="./functions/javascript/calendar.js" defer></script>
</head>
<body>

<header>
    <img src="./images/logov2.png" class="logo">

    <nav>
        <a href="dashboard.php" class="active">Home</a>
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

<div class="container">

    <div class="calendarContainer">
        <form>
            <label for="dateInput">Select a Date</label>
            <input type="date" id="dateInput" name="calendar-date" placeholder="Select a Date;" readonly required>
            <div id="calendar"></div>
        </form>
    </div>

    <div class="fill-up">

        <form>
            <input class="form-design" type="text" id="petname" name="petname" placeholder="Enter Pet Name" required><br>
            <input class="form-design" type="text" id="petsize" name="petsize" placeholder="Enter Pet Size" required><br><br>
            <select class="secondform-design" name="package" required>
                <option value="" disabled selected>Choose a Package</option>
                <option value="full">Full Grooming Package</option>
                <option value="basic">Basic Grooming Package</option>
                <option value="bathAndblowdry">Bath & Blowdry Package</option>
            </select>

            <select class="secondform-design" name="package" required>
                <option value="" disabled selected>Method of Payment</option>
                <option value="full">Cash</option>
                <option value="basic">Gcash</option>
            </select><br><br>
            <button class="submitBtn" type="submit">Book Now!</button>
        </form>
    </div>

</div>

</body>
</html>
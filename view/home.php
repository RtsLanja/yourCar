<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>yourCar</title>
</head>
<body>
    <div class="top_bar">
        <div class="logo">
            <div class="logo">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="w-6 h-6">
                <path fillRule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clipRule="evenodd" />
                </svg>
                <p class="part1">your<span class ="part2">Car</span></p>
            </div>
            </div>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="car.php" class="forAdmin">Cars</a></li>
            <li><a href="client.php">Clients</a></li>
            <li><a href="buy.php">Buy</a></li>
        </ul>
    </div>
    <div class="all">
        <p class="part0">your<span class ="part2">Car</span></p><br>
        <h2>"The best platform to buy your dream car!"</h2><br>
        <p class="text">Welcome to <span class="part3">your<span class="part2">Car</span></span>.Where we make car shopping a breeze.With a diverse selection of vehicules.We're here to help you to find the perfect match.Stop by today and drive off in style!</p>
        <button><a href="">Read more about us</a></button>
    </div>
    <!-- footer -->
    <footer>
        <div class="services_list">
            <div class="service">
              <img src="../image/clock.png" alt="">
              <h2>Open</h2>
              <p>10h30 à 23h45</p>
              <p>23h45 à 9h30</p>
            </div>

        <div class="service">
            <img src="../image/pin.png" alt="">
            <h2>Adress</h2>
            <p>Antsirabe-Madagascar</p>
            <p>Fianarantsoa-Madagascar</p>
        </div>
        <div class="service">
            <img src="../image/email.png" alt="">
            <h2>Emails</h2>
            <p>rantorazaka12@gmail.com</p>
            <p>luciarovatiaona@gmail.com</p>
        </div>
        <div class="service">
            <img src="../image/call.png" alt="">
            <h2>Numbers</h2>
            <p>+261 347496125</p>
            <p>+261 321908248</p>
        </div>
            
            <hr>
        </div>

        <p class="footer_text">Created by <span>RAZAKAMANANA Rantosoa Lanja </span>and<span> ANRIAMAMINIAINA Rovatiana Lucia</span></p>
      </footer>
</body>
</html>
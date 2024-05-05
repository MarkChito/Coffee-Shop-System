<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coffee Shop System</title>

    <link rel="shortcut icon" href="<?= $base_url ?>favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="<?= $base_url ?>plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>plugins/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/plugins/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css">
</head>

<body>
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo" style="text-decoration: none;">coffee Shop <i class="fas fa-mug-hot"></i></a>

        <nav class="navbar">
            <a href="#home" style="text-decoration: none;">home</a>
            <a href="#about" style="text-decoration: none;">about</a>
            <a href="#menu" style="text-decoration: none;">menu</a>
            <a href="#review" style="text-decoration: none;">review</a>
            <a href="#book" style="text-decoration: none;">book</a>
            <a href="<?= $base_url ?>login" style="text-decoration: none;"><?= isset($name) ? $name : "account" ?></a>
        </nav>

        <i class="fas fa-shopping-cart" id="cart-icon"></i>

        <div class="cart">
            <h2 class="cart-title">Your Cart</h2>

            <div class="cart-content"></div>

            <div class="total">
                <div class="total-title">Total</div>
                <div class="total-price">$0</div>
            </div>

            <button type="button" class="btn-buy">Buy Now</button>

            <i class='fas fa-times' id="cart-close"></i>
        </div>
    </header>
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

        <a href="<?= $base_url ?>" class="logo" style="text-decoration: none;">Coffee Shop <i class="fas fa-mug-hot"></i></a>

        <nav class="navbar">
            <a href="#home" class="nav" style="text-decoration: none;">Home</a>
            <a href="#about" class="nav" style="text-decoration: none;">About</a>
            <a href="#menu" class="nav" style="text-decoration: none;">Menu</a>
            <a href="#review" class="nav" style="text-decoration: none;">Review</a>
            <a href="#book" class="nav" style="text-decoration: none;">Book</a>
            <a href="javascript:void(0)" class="<?= isset($_SESSION["user_id"]) ? "logout nav" : "login nav" ?>" style="text-decoration: none;"><?= isset($name) ? $name : "Account" ?></a>
        </nav>

        <i class="fas fa-shopping-cart position-relative" id="cart-icon">
            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle <?= $cart_data ? null : "d-none" ?>" id="orders_badge"></span>
        </i>

        <div class="cart">
            <h2 class="cart-title">Your Cart</h2>

            <div class="cart-content">
                <?php if (isset($cart_data)) : ?>
                    <?php if ($cart_data) : ?>
                        <?php foreach ($cart_data as $cart_data_row) : ?>
                            <?php $total += $cart_data_row->item_price ?>
                            <?php $orders++ ?>

                            <div class="cart-box">
                                <img src="<?= $base_url ?>assets/image/<?= $cart_data_row->item_image ?>" alt="" class="cart-img">

                                <div class="detail-box">
                                    <div class="cart-product-title"><?= $cart_data_row->item_name ?></div>
                                    <div class="cart-price">₱<?= $cart_data_row->item_price ?></div>
                                    <div class="cart-product-qty">QTY: <strong>1</strong></div>
                                    <input type="number" value="1" class="cart-quantity d-none">
                                </div>

                                <i class='fas fa-trash-alt text-danger cart-remove'></i>
                            </div>
                        <?php endforeach ?>
                    <?php else : ?>
                        <h5 class="text-muted mt-3" id="no_items_yet">No Items Yet</h5>
                    <?php endif ?>
                <?php else : ?>
                    <h5 class="text-muted mt-3" id="no_items_yet">No Items Yet</h5>
                <?php endif ?>
            </div>

            <div class="total">
                <div class="total-title">Total</div>
                <div class="total-price">₱<?= $total ?></div>
            </div>

            <button type="button" class="btn-buy" id="btn_place_order">Place Order<?= $orders > 1 ? "s" : null ?></button>

            <i class='fas fa-times' id="cart-close"></i>
        </div>
    </header>
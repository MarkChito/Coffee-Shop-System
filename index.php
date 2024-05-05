<?php $base_url = "http://localhost/Coffee-Shop-System/" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coffee Shop System</title>

    <link rel="stylesheet" href="<?= $base_url ?>plugins/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/plugins/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css">
</head>

<body>
    <!-- HEADER  -->
    <header class="header">
        <!-- NAV  -->
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo">coffee Shop <i class="fas fa-mug-hot"></i></a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
            <a href="#book">book</a>
            <a href="#account">account</a>
        </nav>

        <!-- CART ICON  -->
        <i class="fas fa-shopping-cart" id="cart-icon"></i>

        <!-- CART  -->
        <div class="cart">
            <h2 class="cart-title">Your Cart</h2>

            <!-- CONTENT  -->
            <div class="cart-content">


            </div>

            <!-- TOTAL   -->
            <div class="total">
                <div class="total-title">Total</div>
                <div class="total-price">$0</div>
            </div>
            <!-- BUY BUTTON  -->
            <button type="button" class="btn-buy">Buy Now</button>
            <!-- CART CLOSE  -->
            <i class='fas fa-times' id="cart-close"></i>
        </div>
        </div>
    </header>

    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>fresh coffee in the morning</h3>
                <a href="#" class="btn">buy one now</a>
            </div>

            <div class="image">
                <img src="assets/image/home-img-1.png" class="main-home-image" alt="">
            </div>
        </div>

        <div class="image-slider">
            <img src="assets/image/home-img-1.png" alt="">
            <img src="assets/image/home-img-2.png" alt="">
            <img src="assets/image/home-img-3.png" alt="">
        </div>
    </section>

    <!-- ABOUT -->
    <section class="about" id="about">
        <h1 class="heading">about us <span>why choose us</span></h1>

        <div class="row">
            <div class="image">
                <img src="assets/image/about-img.png" alt="">
            </div>

            <div class="content">
                <h3 class="title">what's make our coffee special!</h3>
                <p>We Are Passionate About Coffee And Believe That Every Cup Tells A Story. We
                    Are Dedicated To Providing An Exceptional
                    Coffee Experience To Our Customers. Our Love For Coffee Has Led Us On A Voyage Of Exploration And
                    Discovery, As We Travel The World In Search Of The Finest Coffee Beans, Carefully Roasted And Brewed
                    To Perfection.
                </p>
                <p>But Coffee Is Not Just A Drink, It's An Experience. Our Warm And Inviting Atmosphere Is
                    Designed To Be A Haven For Coffee Lovers, Where They Can Relax, Connect, And Embark On Their Own
                    Coffee Voyages.</p>
                <a href="#" class="btn">read more</a>
                <div class="icons-container">
                    <div class="icons">
                        <img src="assets/image/about-icon-1.png" alt="">
                        <h3>quality coffee</h3>
                    </div>
                    <div class="icons">
                        <img src="assets/image/about-icon-2.png" alt="">
                        <h3>our branches</h3>
                    </div>
                    <div class="icons">
                        <img src="assets/image/about-icon-3.png" alt="">
                        <h3>free delivery</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SHOP SECTION  -->
    <section class="menu" id="menu">
        <h1 class="heading">our menu <span>popular menu</span></h1>

        <!-- CONTENT  -->
        <div class="shop-content">
            <!-- BOX 1 -->
            <div class="product-box">
                <img src="assets/image/coffee1-Cafecito-de-Olla.png" alt="" class="product-img">
                <h2 class="product-title">Cafecito de Olla</h2>
                <span class="product-price">₱239</span>
                <i class='fas fa-shopping-cart add-cart'></i>
            </div>
            <!-- BOX 2 -->
            <div class="product-box">
                <img src="assets/image/coffee2-Cinnamon-Coffee-Smoothie.png" alt="" class="product-img">
                <h2 class="product-title">Cinnamon Coffee Smoothie</h2>
                <span class="product-price">₱269</span>
                <i class='fas fa-shopping-cart add-cart'></i>
            </div>
            <!-- BOX 3 -->
            <div class="product-box">
                <img src="assets/image/coffee3-Creamy-Gourmet-Hot-Chocolate.png" alt="" class="product-img">
                <h2 class="product-title">Creamy Gourmet Hot Chocolate</h2>
                <span class="product-price">₱219</span>
                <i class='fas fa-shopping-cart add-cart'></i>
            </div>
            <!-- BOX 4 -->
            <div class="product-box">
                <img src="assets/image/coffee7-Iced-White-Mocha-with-Caramel-and-Salted-Cold-Foam.png" alt="" class="product-img">
                <h2 class="product-title">Iced White Mocha with Caramel</h2>
                <span class="product-price">₱299</span>
                <i class='fas fa-shopping-cart add-cart'></i>
            </div>
            <!-- BOX 5 -->
            <div class="product-box">
                <img src="assets/image/coffee5-Frozen-Irish-Coffee.png" alt="" class="product-img">
                <h2 class="product-title">Frozen Irish Coffee</h2>
                <span class="product-price">₱309</span>
                <i class='fas fa-shopping-cart add-cart'></i>
            </div>
            <!-- BOX 6 -->
            <div class="product-box">
                <img src="assets/image/coffee6-Honey-Almond-Milk-Flat-White.png" alt="" class="product-img">
                <h2 class="product-title">Honey Almond Milk Flat White</h2>
                <span class="product-price">₱249</span>
                <i class='fas fa-shopping-cart add-cart'></i>
            </div>
            <!-- BOX 7 -->
            <div class="product-box">
                <img src="assets/image/coffee8-Maple-Bacon-Latte.png" alt="" class="product-img">
                <h2 class="product-title">Maple Bacon Latte</h2>
                <span class="product-price">₱239</span>
                <i class='fas fa-shopping-cart add-cart'></i>
            </div>
            <!-- BOX 8 -->
            <div class="product-box">
                <img src="assets/image/coffee9-Pumpkin-Spice-Coffee.png" alt="" class="product-img">
                <h2 class="product-title">Pumpkin-Spice-Coffee</h2>
                <span class="product-price">₱319</span>
                <i class='fas fa-shopping-cart add-cart'></i>
            </div>
        </div>
    </section>

    <!-- REVIEW -->
    <section class="review" id="review">
        <h1 class="heading">reviews <span>what people says</span></h1>

        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="assets/image/pic-1.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>The coffee shop's cozy ambiance, friendly staff, and aromatic brews made it a delightful spot for
                        catching up with friends over a latte.</p>
                    <h3>Maria Santos</h3>
                    <span>satisfied client</span>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="assets/image/pic-2.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>I was impressed by the extensive menu options, from classic espresso drinks to unique specialty
                        blends, each crafted with care and precision.</p>
                    <h3>Miguel Cruz</h3>
                    <span>satisfied client</span>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="assets/image/pic-3.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>The coffee shop's attention to detail in both the presentation of their beverages and the
                        selection of locally sourced beans truly elevated the coffee-drinking experience</p>
                    <h3>Antonio Reyes</h3>
                    <span>satisfied client</span>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="assets/image/pic-4.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>The coffee shop's inviting atmosphere, adorned with warm lighting and comfortable seating,
                        provided the perfect setting for a relaxed morning coffee or an afternoon pick-me-up.</p>
                    <h3>Sofia Gonzales</h3>
                    <span>satisfied client</span>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- BOOK -->
    <section class="book" id="book">
        <h1 class="heading">booking <span>reserve a table</span></h1>

        <form action="">
            <input type="text" placeholder="Name" class="box">
            <input type="email" placeholder="Email" class="box">
            <input type="number" placeholder="Number" class="box">
            <textarea name="" placeholder="Message" class="box" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>
    </section>

    <!-- FOOTER -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="#home"><i class="fas fa-arrow-right"></i> home</a>
                <a href="#about"><i class="fas fa-arrow-right"></i> about</a>
                <a href="#menu"><i class="fas fa-arrow-right"></i> menu</a>
                <a href="#review"><i class="fas fa-arrow-right"></i> review</a>
                <a href="#book"><i class="fas fa-arrow-right"></i> book</a>
                <a href="#account"><i class="fas fa-arrow-right"></i> account</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i> +123-456-7890</a>
                <a href="#"><i class="fas fa-phone"></i> +111-222-3333</a>
                <a href="#"><i class="fas fa-envelope"></i> coffeeshop@gmail.com</a>
                <a href="#"><i class="fa fa-map-marker-alt"></i> Philippines</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> twitter</a>
                <a href="#"><i class="fab fa-instagram"></i> instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>
                <a href="#"><i class="fab fa-twitter"></i> twitter</a>
            </div>
        </div>

        <div class="credit">
            <span>&copy; All rights reserved</span>
        </div>
    </section>

    <script src="<?= $base_url ?>plugins/swiper/swiper-bundle.min.js"></script>
    <script src="<?= $base_url ?>assets/js/main.js"></script>
    <script src="<?= $base_url ?>assets/js/script.js"></script>
</body>

</html>
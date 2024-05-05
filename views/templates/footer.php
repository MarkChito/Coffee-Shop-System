<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="#home" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> home</a>
            <a href="#about" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> about</a>
            <a href="#menu" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> menu</a>
            <a href="#review" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> review</a>
            <a href="#book" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> book</a>
            <a href="<?= $base_url ?>login" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> account</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fas fa-phone"></i> +123-456-7890</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fas fa-phone"></i> +111-222-3333</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fas fa-envelope"></i> coffeeshop@gmail.com</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fa fa-map-marker-alt"></i> Philippines</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-facebook-f"></i> facebook</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-twitter"></i> twitter</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-instagram"></i> instagram</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-linkedin"></i> linkedin</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-twitter"></i> twitter</a>
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

<?php unset($_SESSION["notification"]) ?>
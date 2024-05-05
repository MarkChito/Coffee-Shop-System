<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="#home" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> Home</a>
            <a href="#about" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> About</a>
            <a href="#menu" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> Menu</a>
            <a href="#review" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> Review</a>
            <a href="#book" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> Book</a>
            <a href="<?= $base_url ?>login" style="text-decoration: none;"><i class="fas fa-arrow-right"></i> Account</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fas fa-phone"></i> +123-456-7890</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fas fa-phone"></i> +111-222-3333</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fas fa-envelope"></i> coffeeshop@gmail.com</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fa fa-map-marker-alt"></i> Philippines</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-linkedin"></i> Linkedin</a>
            <a href="javascript:void(0)" style="text-decoration: none;"><i class="fab fa-twitter"></i> Twitter</a>
        </div>
    </div>

    <div class="credit">
        <span>&copy; All Rights Reserved</span>
    </div>
</section>

<script src="<?= $base_url ?>plugins/jquery/jquery-3.7.1.min.js"></script>
<script src="<?= $base_url ?>plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?= $base_url ?>plugins/swiper/swiper-bundle.min.js"></script>
<script src="<?= $base_url ?>assets/js/main.js"></script>
<script src="<?= $base_url ?>assets/js/script.js"></script>

<script>
    jQuery(document).ready(function() {
        const base_url = "<?= $base_url ?>";
        const notification = <?= isset($_SESSION["notification"]) ? json_encode($_SESSION["notification"]) : json_encode(null) ?>;
        const server = "<?= $base_url ?>server/server.php";

        if (notification) {
            flash_alert(notification);
        }

        $(".login").click(function() {
            location.href = base_url + "login";
        })

        $(".logout").click(function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You are going to logout!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Logout"
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData();

                    formData.append('logout', true);

                    $.ajax({
                        url: server,
                        data: formData,
                        type: 'POST',
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            location.href = base_url;
                        },
                        error: function(_, _, error) {
                            console.error(error);
                        }
                    });
                }
            });
        })

        function flash_alert(notification) {
            Swal.fire({
                title: notification.title,
                text: notification.text,
                icon: notification.icon
            });
        }
    })
</script>

</body>

</html>

<?php unset($_SESSION["notification"]) ?>
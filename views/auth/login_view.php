<?php
$base_url = "http://localhost/Coffee-Shop-System/";

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coffee Shop System - Login</title>

    <link rel="shortcut icon" href="<?= $base_url ?>favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="<?= $base_url ?>plugins/bootstrap/css/bootstrap.min.css">
</head>

<body style="background-image: url(<?= $base_url ?>assets/image/book-bg.jpg); background-size: cover; background-repeat: no-repeat;">
    <!-- Login Page -->
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="d-block">
            <div class="alert alert-danger text-center d-none" id="login_alert">Invalid Username or Password</div>

            <div class="card">
                <div class="card-header text-center p-4">
                    <a href="<?= $base_url ?>" class="text-dark" style="text-decoration: none;">
                        <img src="<?= $base_url ?>assets/image/home-img-3.png" style="max-width: 200px; max-height: 200px; border-radius: 50%;" class="mb-2">
                        <h1>Coffee Shop System</h1>
                    </a>
                </div>
                <div class="card-body">
                    <p class="text-center">Please login to continue</p>

                    <form action="javascript:void(0)" id="login_form">
                        <div class="form-group mb-3">
                            <label for="login_username">Username</label>
                            <input type="text" class="form-control" id="login_username" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="login_password">Password</label>
                            <input type="password" class="form-control" id="login_password" required>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="login_show_password">
                            <label class="form-check-label" for="login_show_password">Show Password</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-2" id="login_submit">Login</button>

                        <p class="mb-0">
                            Need an Account?
                            <a href="javascript:void(0)" id="btn_register">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="register_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create an Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="javascript:void(0)" id="register_form">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="register_name">Name</label>
                            <input type="text" id="register_name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="register_username">Username</label>
                            <input type="text" id="register_username" class="form-control" required>
                            <small class="text-danger d-none" id="error_register_username">Username is already in use</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="register_password">Password</label>
                            <input type="password" id="register_password" class="form-control" required>
                            <small class="text-danger d-none" id="error_register_password">Passwords do not match</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="register_confirm_password">Confirm Password</label>
                            <input type="password" id="register_confirm_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="register_submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= $base_url ?>plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= $base_url ?>plugins/jquery/jquery-3.7.1.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            const base_url = "<?= $base_url ?>";
            const notification = <?= isset($_SESSION["notification"]) ? json_encode($_SESSION["notification"]) : json_encode(null) ?>;
            const server = "<?= $base_url ?>server/server.php";

            $("#login_alert").removeClass("alert-danger");
            $("#login_alert").removeClass("alert-success");

            if (notification) {
                flash_alert(notification);
            }

            $("#login_form").submit(function() {
                const username = $("#login_username").val();
                const password = $("#login_password").val();

                $("#login_submit").text("Please wait...");
                $("#login_submit").attr("disabled", true);

                var formData = new FormData();

                formData.append('username', username);
                formData.append('password', password);

                formData.append('login', true);

                $.ajax({
                    url: server,
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response) {
                            location.href = base_url;
                        } else {
                            location.href = base_url + "login";
                        }
                    },
                    error: function(_, _, error) {
                        console.error(error);
                    }
                });
            })

            $("#login_show_password").change(function() {
                var passwordField = $("#login_password");
                var passwordFieldType = passwordField.attr("type");

                if ($(this).is(":checked")) {
                    passwordField.attr("type", "text");
                } else {
                    passwordField.attr("type", "password");
                }
            })

            $("#btn_register").click(function() {
                $("#register_modal").modal("show");
            })

            $("#register_form").submit(function() {
                const name = $("#register_name").val();
                const username = $("#register_username").val();
                const password = $("#register_password").val();
                const confirm_password = $("#register_confirm_password").val();

                if (password == confirm_password) {
                    $("#register_submit").text("Please wait...");
                    $("#register_submit").attr("disabled", true);

                    var formData = new FormData();

                    formData.append('name', name);
                    formData.append('username', username);
                    formData.append('password', password);

                    formData.append('register', true);

                    $.ajax({
                        url: server,
                        data: formData,
                        type: 'POST',
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response) {
                                location.href = base_url + "login";
                            } else {
                                $("#register_username").addClass("is-invalid");
                                $("#error_register_username").removeClass("d-none");

                                $("#register_submit").text("Register");
                                $("#register_submit").removeAttr("disabled");
                            }
                        },
                        error: function(_, _, error) {
                            console.error(error);
                        }
                    });
                } else {
                    $("#register_password").addClass("is-invalid");
                    $("#register_confirm_password").addClass("is-invalid");

                    $("#error_register_password").removeClass("d-none");
                }
            })

            $("#register_username").keydown(function() {
                $("#register_username").removeClass("is-invalid");
                $("#error_register_username").addClass("d-none");
            })

            $("#register_password").keydown(function() {
                $("#register_password").removeClass("is-invalid");
                $("#register_confirm_password").removeClass("is-invalid");

                $("#error_register_password").addClass("d-none");
            })

            $("#register_confirm_password").keydown(function() {
                $("#register_password").removeClass("is-invalid");
                $("#register_confirm_password").removeClass("is-invalid");

                $("#error_register_password").addClass("d-none");
            })

            function flash_alert(notification) {
                let alert_type = "";

                switch (notification.icon) {
                    case "success":
                        alert_type = "alert-success";

                        break;

                    case "error":
                        alert_type = "alert-danger";

                        break;

                    case "warning":
                        alert_type = "alert-warning";

                        break;

                    case "info":
                        alert_type = "alert-info";

                        break;
                }

                $("#login_alert").text(notification.text);
                $("#login_alert").addClass(alert_type);
                $("#login_alert").removeClass("d-none");
            }

            function back_to_top() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }

            function disable_developer_functions(enabled) {
                if (enabled) {
                    $(document).on('contextmenu', function() {
                        return false;
                    });

                    $(document).on('keydown', function(event) {
                        if (event.ctrlKey && event.shiftKey) {
                            if (event.keyCode === 74) {
                                return false;
                            }

                            if (event.keyCode === 67) {
                                return false;
                            }

                            if (event.keyCode === 73) {
                                return false;
                            }
                        }

                        if (event.ctrlKey && event.keyCode === 85) {
                            return false;
                        }
                    });
                }
            }
        })
    </script>
</body>

</html>

<?php unset($_SESSION["notification"]) ?>
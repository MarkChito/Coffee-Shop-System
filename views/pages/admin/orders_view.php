<?php
require_once "../../../model/model.php";

$base_url = "http://localhost/Coffee-Shop-System/";

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION["user_id"])) {
    if ($_SESSION["user_type"] != "admin") {
        $_SESSION["notification"] = array(
            "title" => "Oops...",
            "text" => "Access denied!",
            "icon" => "error"
        );

        header("location: " . $base_url);

        exit();
    }

    $user_data = $model->MOD_GET_USER_DATA($_SESSION["user_id"]);

    $name = $user_data[0]->name;
} else {
    $_SESSION["notification"] = array(
        "title" => "Oops...",
        "text" => "You must login first!",
        "icon" => "error"
    );

    header("location: " . $base_url);

    exit();
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
    <link rel="stylesheet" href="<?= $base_url ?>plugins/datatables/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="<?= $base_url ?>/plugins/font-awesome/css/all.min.css">
</head>

<body style="background-image: url(<?= $base_url ?>assets/image/book-bg.jpg); background-size: cover; background-repeat: no-repeat;">
    <div class="d-flex justify-content-center align-items-center container" style="min-height: 100vh;">
        <div class="d-block">
            <h1 class="mb-5 text-center"><u>Customer Orders</u></h1>

            <div class="row d-flex align-items-center mb-2">
                <div class="col-md-6">
                    <strong>Administrator Name:</strong>
                    <span><?= $name ?></span>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger btn-sm float-end logout">
                        <i class="fas fa-sign-out-alt me-1"></i>
                        Logout
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Item Name</th>
                                <th>Item Price</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $orders = $model->MOD_GET_ORDERS() ?>

                            <?php if ($orders) : ?>
                                <?php foreach ($orders as $orders_row) : ?>
                                    <?php $user_data = $model->MOD_GET_USER_DATA($orders_row->user_id) ?>
                                    <tr>
                                        <td><?= $user_data[0]->name ?></td>
                                        <td><?= $orders_row->item_name ?></td>
                                        <td>₱<?= number_format($orders_row->item_price, 2) ?></td>
                                        <td><?= $orders_row->status ?></td>
                                        <td class="text-center">
                                            <button style="border: none; background-color: transparent; cursor: <?= $orders_row->status != "Placed Order" ? "not-allowed" : null ?>" class="update_status" title="<?= $orders_row->status != "Placed Order" ? null : "Approve Order" ?>" status="Approve" order_id="<?= $orders_row->id ?>" <?= $orders_row->status != "Placed Order" ? "disabled" : null ?>>
                                                <i class="fas fa-thumbs-up <?= $orders_row->status != "Placed Order" ? "text-muted" : "text-success" ?>"></i>
                                            </button>
                                            <button style="border: none; background-color: transparent; cursor: <?= $orders_row->status != "Placed Order" ? "not-allowed" : null ?>" class="update_status" title="<?= $orders_row->status != "Placed Order" ? null : "Reject Order" ?>" status="Reject" order_id="<?= $orders_row->id ?>" <?= $orders_row->status != "Placed Order" ? "disabled" : null ?>>
                                                <i class="fas fa-thumbs-down <?= $orders_row->status != "Placed Order" ? "text-muted" : "text-danger" ?>"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= $base_url ?>plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= $base_url ?>plugins/jquery/jquery-3.7.1.min.js"></script>
    <script src="<?= $base_url ?>plugins/datatables/js/dataTables.js"></script>
    <script src="<?= $base_url ?>plugins/datatables/js/dataTables.bootstrap5.js"></script>
    <script src="<?= $base_url ?>plugins/sweetalert/sweetalert.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            const base_url = "<?= $base_url ?>";
            const notification = <?= isset($_SESSION["notification"]) ? json_encode($_SESSION["notification"]) : json_encode(null) ?>;
            const server = "<?= $base_url ?>server/server.php";

            if (notification) {
                flash_alert(notification);
            }

            $('.datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                "responsive": true,
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

            $(document).on("click", ".update_status", function() {
                const order_id = $(this).attr("order_id");
                const status = $(this).attr("status");

                Swal.fire({
                    title: "Are you sure?",
                    text: "You are going to '" + status + "' this order!",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, " + status + " it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formData = new FormData();
                        
                        formData.append('order_id', order_id);
                        formData.append('status', status);

                        formData.append('update_status', status);
                        
                        $.ajax({
                            url: server,
                            data: formData,
                            type: 'POST',
                            dataType: 'JSON',
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                location.href = base_url + "orders";
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
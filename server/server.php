<?php
require_once "../model/model.php";

date_default_timezone_set('Asia/Manila');

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_POST["register"])) {
    $response = false;

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!$model->MOD_CHECK_USERNAME($username)) {
        $model->MOD_CREATE_AN_ACCOUNT($name, $username, password_hash($password, PASSWORD_BCRYPT));

        $_SESSION["notification"] = array(
            "title" => "Success!",
            "text" => "Account has been saved successfully!",
            "icon" => "success"
        );

        $response = true;
    }

    echo json_encode($response);
}

if (isset($_POST["login"])) {
    $response = false;

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($user_data = $model->MOD_CHECK_USERNAME($username)) {
        $hash = $user_data[0]->password;

        if (password_verify($password, $hash)) {
            $_SESSION["user_id"] = $user_data[0]->id;
            $_SESSION["user_type"] = $user_data[0]->user_type;

            $_SESSION["notification"] = array(
                "title" => "Success!",
                "text" => "Welcome, " . $user_data[0]->name . "!",
                "icon" => "success"
            );

            $response = array("user_type" => $user_data[0]->user_type);
        } else {
            $_SESSION["notification"] = array(
                "title" => "Oops...",
                "text" => "Invalid Username or Password",
                "icon" => "error"
            );
        }
    } else {
        $_SESSION["notification"] = array(
            "title" => "Oops...",
            "text" => "Invalid Username or Password",
            "icon" => "error"
        );
    }

    echo json_encode($response);
}

if (isset($_POST["add_to_cart"])) {
    $response = false;

    $user_id = $_POST["user_id"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_image = $_POST["product_image"];
    $status = "Cart";

    if (!$model->MOD_CHECK_CART($product_name)) {
        $model->MOD_ADD_TO_CART($user_id, $product_name, $product_price, $product_image,  $status);

        $response = true;
    }

    echo json_encode($response);
}

if (isset($_POST["remove_item"])) {
    $item_name = $_POST["item_name"];

    $model->MOD_REMOVE_FROM_CART($item_name);

    echo json_encode(true);
}

if (isset($_POST["place_order"])) {
    $user_id = $_POST["user_id"];

    $model->MOD_PLACE_ORDER($user_id);

    $_SESSION["notification"] = array(
        "title" => "Success!",
        "text" => "Your order has been placed.",
        "icon" => "success"
    );

    echo json_encode(true);
}

if (isset($_POST["update_status"])) {
    $order_id = $_POST["order_id"];
    $status = $_POST["status"];

    if ($status == "Approve") {
        $status = $status . "d";
    } else {
        $status = $status . "ed";
    }

    $model->MOD_UPDATE_STATUS($status, $order_id);

    $_SESSION["notification"] = array(
        "title" => "Success!",
        "text" => "Order has been " . $status . "!",
        "icon" => "success"
    );

    echo json_encode(true);
}

if (isset($_POST["logout"])) {
    unset($_SESSION["user_id"]);

    $_SESSION["notification"] = array(
        "title" => "Success!",
        "text" => "You have been logged out",
        "icon" => "success"
    );

    echo json_encode(true);
}

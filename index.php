<?php
require_once "model/model.php";

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$base_url = "http://localhost/Coffee-Shop-System/";

if (isset($_SESSION["user_id"])) {
    $user_data = $model->MOD_GET_USER_DATA($_SESSION["user_id"]);

    $name = $user_data[0]->name;

    $cart_data = $model->MOD_GET_CART_DATA($_SESSION["user_id"]);
}

$total = 0;
$orders = 0;

include_once "views/templates/header.php";
include_once "views/pages/home_view.php";
include_once "views/templates/footer.php";

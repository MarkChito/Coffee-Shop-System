<?php
require_once "model/model.php";

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$base_url = "http://localhost/Coffee-Shop-System/";

include_once "views/templates/header.php";
include_once "views/pages/home_view.php";
include_once "views/templates/footer.php";
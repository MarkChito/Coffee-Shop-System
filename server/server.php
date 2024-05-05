<?php
include_once("../model/model.php");

date_default_timezone_set('Asia/Manila');

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_POST["register"])) {
    $_SESSION["notification"] = array(
        "title" => "Success!",
        "text" => "Account has been saved successfully!",
        "icon" => "success"
    );

    echo json_encode(true);
}

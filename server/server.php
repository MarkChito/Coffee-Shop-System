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

            $_SESSION["notification"] = array(
                "title" => "Success!",
                "text" => "OK",
                "icon" => "success"
            );

            $response = true;
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

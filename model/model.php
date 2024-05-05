<?php

class Model
{
    private function MOD_CONNECT_TO_DATABASE()
    {
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "coffee_shop_system";

        $conn = new mysqli($servername, $db_username, $db_password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function MOD_CHECK_USERNAME($username)
    {
        $conn = $this->MOD_CONNECT_TO_DATABASE();

        $sql = $conn->prepare("SELECT * FROM `tbl_info_useraccounts` WHERE username = ?");
        $sql->bind_param("s", $username);
        $sql->execute();

        $result = $sql->get_result();

        $userObjects = array();

        while ($userObject = $result->fetch_object()) {
            $userObjects[] = $userObject;
        }

        $sql->close();
        $conn->close();

        return $userObjects;
    }

    public function MOD_CREATE_AN_ACCOUNT($name, $username, $password)
    {
        $conn = $this->MOD_CONNECT_TO_DATABASE();

        $sql = $conn->prepare("INSERT INTO `tbl_info_useraccounts` (`id`, `name`, `username`, `password`, `user_type`) VALUES (NULL, ?, ?, ?, 'customer')");
        $sql->bind_param("sss", $name, $username, $password);
        $sql->execute();

        $sql->close();
        $conn->close();
    }
}

$model = new model();

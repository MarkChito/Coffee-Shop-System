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
    
    public function MOD_GET_USER_DATA($user_id)
    {
        $conn = $this->MOD_CONNECT_TO_DATABASE();

        $sql = $conn->prepare("SELECT * FROM `tbl_info_useraccounts` WHERE id = ?");
        $sql->bind_param("s", $user_id);
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

    public function MOD_ADD_TO_CART($user_id, $product_name, $product_price, $product_image, $status)
    {
        $conn = $this->MOD_CONNECT_TO_DATABASE();

        $sql = $conn->prepare("INSERT INTO `tbl_info_orders` (`id`, `user_id`, `item_name`, `item_price`, `item_image`, `status`) VALUES (NULL, ?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $user_id, $product_name, $product_price, $product_image, $status);
        $sql->execute();

        $sql->close();
        $conn->close();
    }
    
    public function MOD_PLACE_ORDER($user_id)
    {
        $conn = $this->MOD_CONNECT_TO_DATABASE();

        $sql = $conn->prepare("UPDATE `tbl_info_orders` SET `status` = 'Placed Order' WHERE `user_id` = ? AND `status` = 'Cart'");
        $sql->bind_param("s", $user_id);
        $sql->execute();

        $sql->close();
        $conn->close();
    }
    
    public function MOD_REMOVE_FROM_CART($item_name)
    {
        $conn = $this->MOD_CONNECT_TO_DATABASE();

        $sql = $conn->prepare("DELETE FROM `tbl_info_orders` WHERE `item_name` = ?");
        $sql->bind_param("s", $item_name);
        $sql->execute();

        $sql->close();
        $conn->close();
    }

    public function MOD_GET_CART_DATA($user_id)
    {
        $conn = $this->MOD_CONNECT_TO_DATABASE();

        $sql = $conn->prepare("SELECT * FROM `tbl_info_orders` WHERE `status` = 'Cart' AND `user_id` = ?");
        $sql->bind_param("s", $user_id);
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
    
    public function MOD_CHECK_CART($item_name)
    {
        $conn = $this->MOD_CONNECT_TO_DATABASE();

        $sql = $conn->prepare("SELECT * FROM `tbl_info_orders` WHERE `status` = 'Cart' AND `item_name` = ?");
        $sql->bind_param("s", $item_name);
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
}

$model = new model();

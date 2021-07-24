<?php


namespace model;


abstract class BaseModel
{


    static public function viewOrder($id) {

        $sqlSelectOne = "SELECT * FROM `order` WHERE id = $id";
        $sql = DatabaseConnection::query($sqlSelectOne);
        return $sql;
    }


    static public function orderList()
    {
        $sqlSelectAll = "SELECT id, product_name, count, cost, delivery_date_time,`status` FROM `order`";
        $sql = DatabaseConnection::query($sqlSelectAll);
        return $sql;
    }


    static public function orderCarrierList() {

        $sqlSelectAll = "SELECT product_name, count, address, delivery_date_time FROM `order` WHERE `status` =2";
        $sql = DatabaseConnection::query($sqlSelectAll);
        return $sql;
    }


    static public function userLog($login, $password)
    {
        $login = trim($login);
        $password = trim($password);
        $sqlLogin = "SELECT * FROM `user` WHERE login='$login' AND password ='$password' AND (status ='10' OR status ='9' OR status ='8')";
           return  DatabaseConnection::query($sqlLogin);
}


    static public function viewProduct($id) {

        $sqlSelectOne = "SELECT * FROM `order` WHERE id = $id";
        $sql = DatabaseConnection::query($sqlSelectOne);
        return $sql;

    }


    static public function productList()
    {
        $sqlSelectAll = "SELECT id, name, price FROM `product`";
        $sql = DatabaseConnection::query($sqlSelectAll);
        return $sql;
    }


    static public function editStatus($id, $status)
    {

        $sqlSelectAll = "UPDATE `order` SET `status` = '$status' WHERE `order`.`id` = $id";
        $sql = DatabaseConnection::query($sqlSelectAll);

        return $sql;
    }


    static public function insertData($param) {

        $sqlFields = "INSERT INTO $param->dbName.order (product_name, product_weight, count, cost, address, tel, additional_info, order_date_time, delivery_date_time, status)";

        $sqlValues = ' VALUES (' . "'" . $param->product_name . "'" . ',' . "'" . $param->product_weight . "'" . ',' . "'" . $param->count . "'" . ',' . "'" . $param->cost . "'" . ',' . "'" . $param->address . "'" . ',' . "'" . $param->tel . "'" . ',' . "'" . $param->additional_info . "'" . ',' . "'" . $param->orderDateTime . "'" .  ',' . "'" . $param->deliveryDateTime . "'" .  ',' . "'" . 1 . "'" .  ')';

        $sql = $sqlFields . $sqlValues;

        DatabaseConnection::query($sql);

        return true;
    }

    static public function createDbTables() {

        $db = DB_NAME;

        DatabaseConnection::query("CREATE TABLE $db.order (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_weight` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(32) NOT NULL,
  `additional_info` text NOT NULL DEFAULT '',
  `order_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `delivery_date_time` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        DatabaseConnection::query("CREATE TABLE $db.user (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cookie` varchar(64) NOT NULL,
  `status` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        DatabaseConnection::query("INSERT INTO `user` (`id`, `login`, `password`, `cookie`, `status`) VALUES
(1, 'admin', '333', 'PHPSESSID=9rrkjh76ip2op41lhep36i9dps', 10),
(2, 'carrier', '596', 'PHPSESSID=9rr20r0mip2op41lfggi9dps', 9),
(3, 'seller', '795', 'PHPSESSID=9rr20r0mip2op41lhep36i9dps', 8);");
    }

}
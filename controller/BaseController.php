<?php


namespace controller;


use controller\View;
use model\BaseModel;


class BaseController
{

    protected $departureAddress;

       public function costOfDelivery($param) {


        $distance = $this->googleMapMethod($param->address);

        if($param->count < 10) {
            $deliveryCost = TARIFF * $distance * $param->product_weight;

        } elseif($param->count >= 10 && $param->count <= 100) {
            $deliveryCost = (TARIFF * $distance * $param->product_weight) * 1.5;

        } else {
            $deliveryCost = (TARIFF * $distance * $param->product_weight) * 2;
        }

        return $deliveryCost;

    }

    public function creationOrder($param) {


        $param->dbName = DB_NAME;

        $date = new \DateTime();

        $date->add(new \DateInterval('PT3H'));
        $param->orderDateTime = $date->format('Y-m-d H:i:s');
        $res = DELIVERY_TIME;
        $deliveryInterval = 'PT' . ($res) . 'H';
        $date->add(new \DateInterval($deliveryInterval));
        $param->deliveryDateTime = $date->format('Y-m-d H:i:s');

        $cost = $this->costOfDelivery($param);
        $param->cost = $cost;

        BaseModel::insertData($param);

        return $param->deliveryDateTime;

    }

    protected function googleMapMethod ($receivingAddress) {

        $positionOne = $this->departureAddress = 52;
        $positionTwo = $receivingAddress = 58;
        $distance = abs($positionOne - $positionTwo);


       return $distance;

    }


    protected function logOut() {
        unset($_SESSION['auth']);
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['status']);
        unset($_SESSION['password']);
    }


    protected function login($login, $password) {
     $sql = BaseModel::userLog($login, $password);
        if(!empty($sql) && is_array($sql)) {
            if ($sql[0]['status'] == 10) {

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $sql[0]['id'];
                $_SESSION['login'] = $sql[0]['login'];
                $_SESSION['status'] = $sql[0]['status'];
//                "UPDATE `user` SET cookie="
            } elseif ($sql[0]['status'] == 9) {

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $sql[0]['id'];
                $_SESSION['login'] = $sql[0]['login'];
                $_SESSION['status'] = $sql[0]['status'];
            } elseif ($sql[0]['status'] == 8) {

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $sql[0]['id'];
                $_SESSION['login'] = $sql[0]['login'];
                $_SESSION['status'] = $sql[0]['status'];
            } else {
                echo 'Incorrect Login or Password';
                unset($_SESSION['auth']);
                unset($_SESSION['id']);
                unset($_SESSION['login']);
                unset($_SESSION['status']);
                unset($_SESSION['password']);
            }

            return $sql;
        }
    }



    protected function render($layout, $file, $vars = [])
    {

        $layout = str_replace('/controller/', '/', $layout);

        if (!empty($vars) && $vars !== 0) {
            if(is_array($vars) && !empty($vars['id'])) {
                echo (new View())->renderView($layout, $file, $vars, $vars['id']);
            } else {
                echo (new View())->renderView($layout, $file, $vars);
            }
        } else {
            echo (new View())->renderView($layout, $file);
        }
    }




    protected function rateLimit($rate, $per) {
        $timeout = 0;
        $time = microtime(true);
        file_put_contents('/var/www/tz/log/rate.log', $time . '/', FILE_APPEND);
        $rateCount = file_get_contents('/var/www/tz/log/rate.log');
        $rateCount = rtrim($rateCount, '/');
        $rateArr = explode('/', $rateCount);
        $count = count($rateArr);

        if ($count === ($rate + 1)) {

            $time = (int)$rateArr[$count - 1] - (int)$rateArr[0];
            if ($time < $per) {
                $timeout = $per - $time;
                $timeArr = [];
                file_put_contents('/var/www/tz/log/rate.log', '');
                unset($count, $time);
                return $timeout;

            }  else {
                $timeArr = [];
                file_put_contents('/var/www/tz/log/rate.log', '');
                unset($count, $time);
                return $timeout;

            }

        } elseif ($count > $rate) {
            $timeArr = [];
            file_put_contents('/var/www/tz/log/rate.log', '');
            unset($count, $time);
            return $timeout;

        } else {
            return $timeout;
        }
    }

    protected function validate($param, $tel = false) {



        if(!empty($param->product_name)) {
            $productName = trim($param->product_name);
        } else {
            return false;
        }


        if(!empty($param->product_weight)) {
            $productWeight = trim($param->product_weight);
            if(is_numeric($productWeight)) {

            } else {
                return false;
            }

        } else {
            return false;
        }


        if(!empty($param->count)) {
            $count = trim($param->count);
            if(is_numeric($count)) {

            } else {return false;}

        } else {
            return false;

        }

        if(!empty($param->cost)) {
            $cost = trim($param->cost);
            if(is_numeric($cost)) {

            } else {
                return false;
            }

        } else {
            return false;
        }

        if(!empty($param->address)) {

            $address = trim($param->address);
        } else {
            return false;
        }

        if($tel === true) {
            if (!empty($param->tel)) {
                $tel = trim($param->tel);
                if (preg_match('/[+]38\D[0][0-9]{2}\D[0-9]{3}\D[0-9]{2}\D[0-9]{2}/', $tel, $matches) === 1) {
                    $param->tel = preg_replace('/([+]38)\D([0][0-9]{2})\D([0-9]{3})\D([0-9]{2})\D([0-9]{2})/', '$1$2$3$4$5', $tel);
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        $param->product_name = $productName;
        $param->product_weight = $productWeight;
        $param->count = $count;
        $param->cost = $cost;
        $param->address = $address;

        return $param;

    }
}
<?php


namespace controller;


class ClientController extends BaseController
{
    public function indexAction()
    {


    }
    public function costAction()
    {


        $json = file_get_contents('php://input');
        file_put_contents('/var/www/tz/log/input-json.log', $json);

        $timeOut = $this->rateLimit(RATE, PERIOD);
        if($timeOut > 0) {
            usleep($timeOut * 1000000);
        }

        $jsonClient = file_get_contents('/var/www/tz/log/input-json.log');
        $calculateTheCost = json_decode($jsonClient);
        $param = $this->validate($calculateTheCost);

        if(!empty($param) && $param !== false) {

            $cost = $this->costOfDelivery($param);
            $curl = curl_init();

            // true для возврата результата передачи в качестве строки из curl_exec()
            // вместо прямого вывода в браузер.
            curl_setopt($curl, CURLOPT_URL, 'http://my-project.loc/client/result');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, "$cost");
            curl_exec($curl);
            curl_close($curl);

        } else {

            return false;
        }

    }



    public function insertAction()
    {

        $json = file_get_contents('php://input');
        file_put_contents('/var/www/tz/log/input-json.log', $json);

        $timeOut = $this->rateLimit(RATE, PERIOD);
        if($timeOut > 0) {
            usleep($timeOut * 1000000);
        }

        $jsonClient = file_get_contents('/var/www/tz/log/input-json.log');
        $bayerInfo = json_decode($jsonClient);
        $param = $this->validate($bayerInfo);

        if (!empty($param) && $param !== false) {

        $deliveryTime = $this->creationOrder($param);

        $curl = curl_init();
        $cost = "Спасибо за то, что воспользовались нашими услугами.<br>Товар будет доставлен Вам не познее чем $deliveryTime";
        // true для возврата результата передачи в качестве строки из curl_exec()
        // вместо прямого вывода в браузер.
        curl_setopt($curl, CURLOPT_URL, 'http://my-project.loc/client/result');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "$cost");
        curl_exec($curl);
        curl_close($curl);

        } else {

            echo 'Error';
            return false;
        }

    }

    public function viewAction($id)
    {

    }
}
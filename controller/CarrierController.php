<?php


namespace controller;


use model\BaseModel;

class CarrierController extends BaseController
{

//    public $templateName = __DIR__ . '/view/layout/carrier.tpl.php';


    public function indexAction()
    {

        if(isset($_POST['login']) && isset($_POST['password'])) {

            $_SESSION['login'] = $_POST['login'];

            $_SESSION['password'] = $_POST['password'];

            $this->login($_SESSION['login'], $_SESSION['password']);
        }

            if ((!empty($_SESSION['auth']) && $_SESSION['auth'] === true) && $_SESSION['status'] == 9) {

                $param = ["Hello Carrier!"];

                $param[2] = BaseModel::orderCarrierList();

                echo(json_encode($param));

//        return Parent::render($this->templateName, dirname(__DIR__) . '/view/carrier/index.tpl.php', compact('param'));

        } else {
                header('HTTP/1.0 403 Forbidden');
                echo 'You are forbidden!';
//                $param = ["Error 403"];
            }
//        return Parent::render($this->templateName, dirname(__DIR__) . '/view/carrier/index.tpl.php', compact('param'));


    }
}
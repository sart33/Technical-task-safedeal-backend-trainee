<?php


namespace controller;


use model\BaseModel;

class SellerController extends BaseController
{

    public $templateName =  __DIR__ . '/view/layout/seller.tpl.php';


    public function indexAction()
    {

        if(isset($_POST['login']) && isset($_POST['password'])) {


            $_SESSION['login'] = $_POST['login'];

            $_SESSION['password'] = $_POST['password'];

            $this->login($_SESSION['login'], $_SESSION['password']);
        }

       if ((!empty($_SESSION['auth']) && $_SESSION['auth'] === true) && $_SESSION['status'] == 8) {

        $param = ["Hello Seller!"];

//        $param[1] = $this->viewOrder(5);

        $param[2] = BaseModel::orderList();




           return Parent::render($this->templateName, dirname(__DIR__) . '/view/seller/index.tpl.php', $param);

       } else {

           header('HTTP/1.0 403 Forbidden');
           echo 'You are forbidden!';
           usleep(5000000);
           header('Location: /login');

       }


    }

    public function viewAction($id) {

        $param = BaseModel::viewOrder($id);
        $param['id'] = $id;


        return  Parent::render($this->templateName,dirname(__DIR__) . '/view/seller/view.tpl.php', $param);

    }

    public function editAction($id) {

        $param = BaseModel::viewOrder($id);
        if (!empty($_POST['status'])) {

        BaseModel::editStatus($id, $_POST['status']);
            header("Location: /seller/id/$id");

        }

        $param['id'] = $id;


        return  Parent::render($this->templateName,dirname(__DIR__) . '/view/seller/edit.tpl.php', $param);

    }


}
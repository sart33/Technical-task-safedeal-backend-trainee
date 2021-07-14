<?php


namespace controller;


use model\BaseModel;

class InputController extends BaseController
{
    public $templateName =  __DIR__ . '/view/layout/input.tpl.php';

    public function indexAction()

    {
//        $this->logOut();

        if (empty($_SESSION['auth']) || $_SESSION['auth'] !== true) {
            unset($_SESSION['login'], $_SESSION['password']);


               header("Location: /login");

        }  else {


         echo '<a href="/logout">logout</a>';

        }

        return Parent::render($this->templateName, dirname(__DIR__) . '/view/input/index.tpl.php');

    }

    public function viewAction($id) {

        $param = '';


        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/input/view.tpl.php', $id);

    }

    public function loginAction()

    {
        if(isset($_POST['login']) && isset($_POST['password'])) {

            $_SESSION['login'] = $_POST['login'];

            $_SESSION['password'] = $_POST['password'];

            $this->login($_SESSION['login'], $_SESSION['password']);

            if(isset($_SESSION['auth']) && isset($_SESSION['status'])) {

                if ($_SESSION['auth'] = true && $_SESSION['status'] == 9) {

                    header("Location: /carrier");

                } elseif ($_SESSION['auth'] = true && $_SESSION['status'] == 8) {

                    header("Location: /seller");

                } else {
                }
            }
        }

        return Parent::render($this->templateName, dirname(__DIR__) . '/view/input/login.tpl.php');
    }

    public function logoutAction() {
        $this->logOut();

        header("Location: /");
    }

    public function createAction() {
        BaseModel::createDbTables();

        echo 'Таблицы БД - успешно созданы<br>';
        echo 'Пользователи с ролями: продавец, курьер и администратор - созданы в БД<br>';

        return true;
    }


}
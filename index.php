<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('VG_ACCESS', true);
require_once 'setting/setting.php';

header('Content-Type:text/html;charset=utf8');
session_start();

use controller\BaseController;


try {
    spl_autoload_register(function ($className) {
//        $y01 = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

        include_once __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

    });

   (new \controller\FrontendController())->parseRouting();



}

catch(\Exception $e) {
    exit($e->getMessage());
}
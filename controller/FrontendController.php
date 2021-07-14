<?php


namespace controller;


class FrontendController
{


    public function parseRouting()
    {
        $urlTwo = '';
        $param = false;
        $url = $_SERVER['REQUEST_URI'];
        $url = ltrim($url, '/');
        if (!empty($url)) {
            if (strpos($url, '/') !== false) {

                $urlArr = explode('/', $url);
                $urlOne = array_shift($urlArr);
                if (!empty($urlArr)) {
                        $urlTwo = array_shift($urlArr);
                        if (!empty($urlArr)) {
                            $urlThree = array_shift($urlArr);
                            if (is_numeric($urlThree)) {
                                $param = $urlThree;
                                }
                            } else {
//                                $urlOne = $urlTwo;

                       }
                    }
                }
            }

        if (!isset($urlOne)) $urlOne = $url;
        if(!isset($urlTwo)) $urlTwo ='';
        $key = $urlOne . '/' . $urlTwo;
        $key = rtrim($key, '/');
        if (isset(Configurations::routeTable()[$key])) {
            $routeWay = Configurations::routeTable()[$key];
        }

        if (isset($routeWay)) {
            $ways = explode('/', $routeWay);
            $className = ucfirst(array_shift($ways)) . 'Controller';
            $classWay = __NAMESPACE__ . '\\' . $className;

            $method = array_shift($ways) . 'Action';

            $Obj2 = new $classWay();

            $Obj2->$method($param);
        }



    }
}

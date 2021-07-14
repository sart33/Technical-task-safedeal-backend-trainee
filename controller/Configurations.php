<?php


namespace controller;


class Configurations
{

    public static function routeTable() {

        return [
            '' => 'input/index',
            'login' => 'input/login',
            'logout' => 'input/logout',
            'seller' => 'seller/index',
            'seller/id' => 'seller/view',
            'seller/edit' => 'seller/edit',
            'carrier' => 'carrier/index',
            'category/id'  => 'category/view',
            'category' => 'category/index',
            'product/id' => 'product/view',
            'product' => 'product/index',
            'client' => 'client/index',
            'client/cost' => 'client/cost',
            'client/insert' => 'client/insert',
            'create-db' => 'input/create'


        ];
    }


}
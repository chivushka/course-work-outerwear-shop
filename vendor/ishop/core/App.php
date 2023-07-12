<?php

namespace ishop;

class App{

    public static $app;

    public function __construct(){
        $query=trim($_SERVER['QUERY_STRING'],'/'); #узнать что ищет пользователь
        session_start();
        self::$app = Registry::instance(); #присваивается контейнер класса Registry
        $this->getParams();
        new ErrorHandler();
        Router::dispatch($query); #передача маршрутизатору запрошенного адреса
    }

    protected function  getParams(){
        $params = require_once CONF. '/params.php';
        if(!empty($params)){
            foreach ($params as $k => $v){
                self::$app->setProperty($k,$v); #заполняем контейнер из файла
            }
        }
    }
}
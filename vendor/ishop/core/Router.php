<?php

namespace ishop;

use http\Exception;

class Router{

    protected static $routes = [];
    protected static $route = [];

    #записывает правило в таблицу маршрутов
    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    #получаем запрос из класса App
    public static function dispatch($url){
        $url=self::removeQueryString($url);
        #проверка существует ли введённый контроллер и действие, его вызов
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] .
                self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject,$action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Метод $controller::$action 
                    не існує",404);
                }
            } else {
                throw new \Exception("Контроллер $controller не існує", 404);
            }
        } else {
            throw new \Exception("Сторінка не існує", 404);
        }
    }

    #сверяет существует ли введённый запрос в таблице маршрутов
    public static function matchRoute($url){
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#i", $url, $matches)) {
                #чтобы убрать ключи-числа
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    //CamelCase
    protected static function upperCamelCase($name){
        return str_replace(' ', '',
            ucwords(str_replace('-', ' ', $name)));
        debug($name);
    }

    //camelCase
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url){
        if($url){
            $params=explode('&', $url, 2);
            if(false === strpos($params[0],'=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }
}
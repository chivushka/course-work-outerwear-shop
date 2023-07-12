<?php

function debug($arr, $die = false){
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if($die) die;
} #для красивого выведения свойств

function redirect($http=false){
    if($http){ //если пользователь передал адрес
        $redirect=$http;
    }else{
        //отправляем пользователя туда, откуда он пришёл
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit;
}

function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

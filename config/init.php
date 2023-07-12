<?php

define("DEBUG",0); #режим разработки - 1, а 0 - режим использования сайта

# определение констант для быстрого доступа к часто используемым папкам
define("ROOT",dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/ishop/core');
define("LIBS", ROOT . '/vendor/ishop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'wear');

# вычисления пути к главной странице сайта
//http://myishop/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//http://myishop/public/
$app_path=preg_replace("#[^/]+$#", '', $app_path);
http://myishop
$app_path=str_replace('/public/','',$app_path);
define("PATH", $app_path);

# доступ к админке
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';
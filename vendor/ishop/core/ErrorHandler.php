<?php

namespace ishop;

class ErrorHandler{

    public function  __construct(){
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this,'exceptionHandler']);
    }

    #обработчик ошибок
    public function exceptionHandler($e){
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Виняток', $e->getMessage(), $e->getFile(),
            $e->getLine(),$e->getCode());
    }

    #запись ошибок в отдельный файл
    protected  function logErrors($message='',$file='',$line=''){
        error_log("[" . date('Y-m-d H:i:s') . "] Текст помилки: {$message} |\nФайл: {$file} | Рядок: {$line}\n==================\n",3,
            ROOT . '/tmp/errors.log' );
    }

    #выведение ошибки на страницу в разных режимах
    protected function displayError($errno, $errstr, $errfile,$errline, $responce = 404){
        http_response_code($responce); 
        if($responce == 404 && !DEBUG){ #пользователь
            require WWW . '/errors/404.php';
            die;
        }
        if(DEBUG){ #разработка
            require WWW . '/errors/dev.php';
        }else{ #продакшн
            require WWW . '/errors/prod.php';
        }
        die;
    }
}
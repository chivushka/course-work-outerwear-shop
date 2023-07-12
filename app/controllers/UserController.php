<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else{
                $user->attributes['password']=password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if($user->save('user')){
                    $_SESSION['success'] = 'Користувач зареєстрований';
                }else{
                    $_SESSION['error'] = 'Помилка!';
                }
            }
          redirect();
        }
        $this->setMeta('Реєстрація');
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                redirect('/');
            }else{
                $_SESSION['error'] = 'Логін чи пароль введені невірно';
            }
            redirect();
        }
        $this->setMeta('Вхід');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

}
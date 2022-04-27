<?php

namespace Controllers;

class UserController extends Controller {

    public function auth() {
        
        if (isset($this->pageData['user'])) {
            header('location: /');
            exit();
        }

        $this->view->render('Views/auth.php', $this->pageData);
    }

    public function login() {

        if (!empty($_POST)) {

            $login = trim($_POST['login']);
            $password = trim($_POST['password']);

            if ($login == 'admin' && $password == '123') {

                session_start();

                $_SESSION['user'] = [
                    'login' => $login,
                    'is_admin' => true
                ];

                header('location: /');
                exit();

            } else {
                $this->pageData['alert'] = ['type' => 'danger', 'msg' => 'Не верный логин или пароль'];
                $this->view->render('Views/auth.php', $this->pageData);
            }

        }
    }

    public function logout() {
        session_destroy();
        header('location: /');
        exit();
    }

}
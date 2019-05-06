<?php
/**
 * Created by PhpStorm.
 * User: mkhit
 * Date: 4/28/2019
 * Time: 11:02 PM
 */

namespace controllers;


use models\User;

class AuthController
{
    public static $data;
    public function login()
    {
        if(isset($_SESSION['user'])) {
           return header('Location: /task/');
        }

        $credentials = isset($_POST['email']) && isset($_POST['password']);
        $user = (new User)::get('id', 'desc')[0];

        if(
            $credentials &&
            password_verify($_POST['password'], $user['password']) &&
            $user['email'] === $_POST['email']
        ) {
            $_SESSION['user'] = $user;
            return header('Location: /task/');
        } elseif($credentials) {
            $_SESSION['error'] = true;
        }

        self::$data['path'] = 'admin.login';
        self::$data['child_datas'] = [];
        return view('admin.layout.app', self::$data['child_datas'], self::$data);
    }

    public function logout()
    {
        $_SESSION = [];
        return header('Location: /task/');
    }
}
?>
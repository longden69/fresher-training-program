<?php

/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 06/06/2017
 * Time: 3:46 CH
 */
require_once ('application/controllers/BaseController.php');
require_once ('application/models/UserModel.php');
class Auth extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if(isset($_POST['submitName']))
        {
            $userName = $_POST['inputUsername'];
            $password = $_POST['inputPassword'];
            $flag = $this->userModel->login($userName, $password);
            if($flag > 0)
            {
                $_SESSION['user'] = $userName;
                header('Location: index.php?controller=UserController&action=getList');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('login');
    }

    public function __checkLogin()
    {

    }
}
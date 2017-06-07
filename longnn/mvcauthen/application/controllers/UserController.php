<?php

/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 07/06/2017
 * Time: 10:30 SA
 */
require_once ('application/models/UserModel.php');
class UserController extends BaseController
{
    private $userModel;
    public function __construct()
    {
        //Chỗ này em làm checkLogin nhưng không thành công bên BaseModel
        //$this->checkLogin();
        $this->userModel = new UserModel();
    }

    /**
     *
     */
    public function getList()
    {
        $data['listUser'] = $this->userModel->getListUser();
        require_once ('application/views/header.php');
        require_once ('application/views/list-users.php');
    }

    public function editUser()
    {
        $idUser = $_GET['id'];
        $data['user'] = $this->userModel->getUser($idUser);
        require_once ('application/views/header.php');
        require_once ('application/views/edit-user.php');
        if(isset($_POST['submitName'])){
            $userName = $_POST['txtUserName'];
            $userEmail = $_POST['txtEmail'];
            $userPassword = md5($_POST['txtPassword']);
            $userStatus = $_POST['slStatus'];
            $file = $_FILES['txtUserName'];
            $fileName = $_FILES['txtUserName']['name'];
            $id = $_POST['id'];
            $ds = "username='$userName', user_email='$userEmail', user_img='$fileName', pass='$userPassword', status='$userStatus'";
            $this->userModel->editUser($ds, $id);
        }
    }


}
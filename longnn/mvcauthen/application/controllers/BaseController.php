<?php
/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 06/06/2017
 * Time: 8:41 SA
 */
require_once ('system/config.php');
require_once ('application/models/BaseModel.php');

class BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new BaseModel();
    }

    /**
     *
     */
    public function index()
    {
        $title = "This is Title!";
        include_once ('application/views/login.php');
    }

    public function checkLogin()
    {
        if($_SESSION['user'] != NULL)
        {
            if($this->model->checkLogin() > 0)
            {
                header('Location: index.php?controller=UserController&action=getList');
            }

            header('Location: index.php?controller=BaseController&action=index');
        }
    }

    /**
     * @param $controller
     * @param $action
     */
    public function load($controller, $action)
    {
        $controller = ucfirst(strtolower($controller));
        $action = strtolower($action);

        if(! file_exists('application/controllers/'.$controller.'.php'))
        {
            die('Controller không tồn tại !');
        }

        require_once 'application/controllers/'.$controller.'.php';
        if(! class_exists($controller))
        {
            die('Class controller không tồn tại !');
        }

        $controllerObject = new $controller();

        if(! method_exists($controller, $action))
        {
            die('Action không tồn tại !');
        }

        $controllerObject -> {$action}();

    }


}
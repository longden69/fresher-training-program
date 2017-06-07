<?php
/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 06/06/2017
 * Time: 8:32 SA
 */
session_start();
require ('application/controllers/BaseController.php');
$objcontroller = new BaseController();
$controllerName = CONTROLLER_DEFAULT;
$acion = ACTION_DEFAULT;
if(isset($_GET['controller']) && isset($_GET['action']))
{
    $controllerName = $_GET['controller'];
    $acion = $_GET['action'];
}

$objcontroller->load($controllerName,$acion);
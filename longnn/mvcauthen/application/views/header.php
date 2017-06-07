<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>NTQ Solution Admin Control Panel</title>

    <link rel="icon" type="image/ico" href="<?=BASE_URL?>application/views/favicon.ico"/>

    <link href="<?=BASE_URL?>public/css/stylesheets.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div class="header">
    <a class="logo" href="list-users.html">
        <img src="<?=BASE_URL?>public/images/logo.png" alt="NTQ Solution - Admin Control Panel" title="NTQ Solution - Admin Control Panel"/>
    </a>

</div>

<div class="menu">

    <div class="breadLine">
        <div class="arrow"></div>
        <div class="adminControl active">
            Hi, Fresher
        </div>
    </div>

    <div class="admin">
        <div class="image">
            <img src="<?=BASE_URL?>public/images/users/avatar.jpg" class="img-polaroid"/>
        </div>
        <ul class="control">
            <li><span class="icon-cog"></span> <a href="edit-user.html">Update Profile</a></li>
            <li><span class="icon-share-alt"></span> <a href="login.html">Logout</a></li>
        </ul>
    </div>

    <ul class="navigation">
        <li>
            <a href="list-users.html">
                <span class="isw-user"></span><span class="text">Users</span>
            </a>
        </li>
    </ul>

</div>
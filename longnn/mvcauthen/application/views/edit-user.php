
<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="list-users.html">List Users</a> <span class="divider">></span></li>
            <li class="active">Edit</li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Users Management</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form method="post" enctype="multipart/form-data" action="index.php?controller=UserController&action=editUser">
                    	<div class="row-form">
                            <div class="span3">Username:</div>
                            <div class="span9"><input type="text" name="txtUserName" value="<?=$data['user'][0]['username']?>" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                        </div>
                    	<div class="row-form">
                            <div class="span3">Email:</div>
                            <div class="span9"><input type="text" value="<?=$data['user'][0]['user_email']?>"  name="txtEmail" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                            <input type="hidden" name="id" value="<?=$data['user'][0]['user_id']?>">
                        </div>
                    	<div class="row-form">
                            <div class="span3">Password:</div>
                            <div class="span9"><input type="password"  name="txtPassword" value="123456" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                        </div>
                    	<div class="row-form">
                            <div class="span3">Upload Avatar:</div>
                            <div class="span9">
                            <img src="<?=BASE_URL.'public/images/users/'.$data['user'][0]['user_img']?>" /><br/>
                            <input type="file" name="file" size="19">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Activate:</div>
                            <div class="span9">
                                <select name="slStatus">
                                    <option value="0">choose a option...</option>
                                    <option value="1">Activate</option>
                                    <option value="2">Deactivate</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                        	<input class="btn btn-success" name="submitName" type="submit" value="Update"  />
							<div class="clear"></div>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>

    </div>

</div>

</body>
</html>
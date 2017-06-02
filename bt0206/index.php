<?php
session_start();
require ('Student.php');
//$_SESSION['student'] = array();
$student = new Student(1,2,3,4);

//$student ->delStudent(6);

if(isset($_GET['action']))
{
    if($_GET['action'] == 'del')
    {
        $id = $_GET['id'];
        $flagdel = $student ->delStudent($id);
        if($flagdel == 0)
        {
            echo "<script>alert('Siêu nhân không tồn tại!'); </script>";
        }
    }
    if($_GET['action'] == 'edit')
    {
        $id = $_GET['id'];
        $flag0 = $dataSV = $student->getStudent($id);
        if($flag0 == 0)
        {
            echo "<script>alert('Siêu nhân không tồn tại!'); </script>";

        }
    }
}
if(isset($_POST['submitAdd']))
{
    $name = $_POST['txtNameStudent'];
    $age = $_POST['txtAgeStudent'];
    $gender = $_POST['slGender'];
    $file = $_FILES['fileName'];

    $flag1 = $student ->addStudent($name, $age, $gender, $file);
    if($flag1 == 1)
    {
        echo "<script>alert('Thêm thành công!');</script>";
    }
}

if(isset($_POST['submitEdit']))
{
    $id = $_POST['id'];
    $name = $_POST['txtNameStudent'];
    $age = $_POST['txtAgeStudent'];
    $gender = $_POST['slGender'];
    $oldAvatar = $_POST['oldAvatar'];
    $file = $_FILES['fileName'];
    $flag2 = $student ->editStudent($id, $name, $age, $gender, $oldAvatar, $file);
    if($flag2 == 1)
    {
        echo "<script>alert('Sửa thành công!');</script>";
        header('index.php');
    }
    else
    {
        echo "<script>alert('Siêu nhân không tồn tại!');</script>";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Quản lí siêu nhân</title>
    <style>
        #boxEdit{
            position: absolute;
            background: #ccc;
            width: 50%;
            height: auto;
            border-radius: 10px;
            left: 25%;
            border:1px solid #000;
            padding: 20px;
        }
        #boxEdit>
    </style>
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script>
        function showFormAdd() {
            $("#boxAdd").show();
        }
        function hideFormAdd() {
            $("#boxAdd").hide();
        }
        function hideFormExit()
        {
            $("#boxEdit").hide();
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="header">

            </div>
            <div class="content">
                <div>
                    <h2>Quản lý siêu nhân</h2>
                    <div class="user-action col-md-12">
                        <a href="#" onclick="showFormAdd();" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm hàng</a>
                        <br>
                        <br>
                        <div class="collapse" id="boxAdd">
                            <div class="row">
                                <a href="#" onclick="hideFormAdd();" class="pull-right   "><span class="glyphicon glyphicon-remove"></span></a>
                                <br>
                            </div>
                            <br>
                            <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label class="col-md-4" for="txtNameStudent">Họ tên SV</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" required name="txtNameStudent" id="txtNameStudent" placeholder="Họ và tên">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4" for="txtAgeStudent">Tuổi</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" required name="txtAgeStudent" id="txtAgeStudent" placeholder="69" max="80" min="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4" for="slGender">Gender</label>
                                    <div class="col-md-8">
                                        <select name="slGender" class="form-control" id="slGender">
                                            <option value="1" selected>Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4" for="fileName">Avatar</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control" required name="fileName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-5">
                                        <input type="submit" class="btn btn-primary" value="Thêm" name="submitAdd">
                                        <input type="reset" class="btn btn-default  " value="Xóa text">
                                    </div>

                                </div>
                            </form>
                        </div>


                        <div class="<?php echo (! isset($dataSV))?'collapse':''; ?>" id="boxEdit">
                            <div class="row">
                                <a href="#" onclick="hideFormExit();" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                <br>
                            </div>
                            <br>
                            <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label class="col-md-offset-1 col-md-3" for="txtNameStudent">Họ tên SV</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="<?php echo (isset($dataSV['name']))?$dataSV['name']:''; ?>" required name="txtNameStudent" id="txtNameStudent" placeholder="Họ và tên">
                                        <input type="hidden" value="<?=$_GET['id'] ?>" name="id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-offset-1 col-md-3" for="txtAgeStudent">Tuổi</label>
                                    <div class="col-md-8">
                                        <input type="number" value="<?php echo (isset($dataSV['age']))?$dataSV['age']:''; ?>" class="form-control" required name="txtAgeStudent" id="txtAgeStudent" placeholder="69" max="80" min="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-offset-1 col-md-3" for="slGender">Gender</label>
                                    <div class="col-md-8">
                                        <select name="slGender" class="form-control" id="slGender">
                                            <option value="1" <?=($dataSV['gender']==1)?'selected':''?> >Nam</option>
                                            <option value="0" <?=($dataSV['gender']==0)?'selected':''?>>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-offset-1 col-md-3" for="fileName">Avatar</label>
                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                            <img class="img-responsive" src="<?=$dataSV['image'] ?>" alt="">
                                            <br>
                                            <input type="hidden" value="<?=$dataSV['image'] ?>" name="oldAvatar">
                                        </div>
                                        <br>
                                        <input type="file" class="form-control" required name="fileName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-5">
                                        <input type="submit" class="btn btn-primary" value="Sửa" name="submitEdit">
                                        <input type="reset" class="btn btn-default  " value="Xóa text">
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                    <br>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Tuổi</th>
                                <th>Giới tính</th>
                                <th>Ảnh đại diện</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($_SESSION['student'] as $key =>$val) { ?>
                                    <tr>
                                        <td><?=$key+1 ?></td>
                                        <td><?=$val['name']?></td>
                                        <td><?=$val['age']?></td>
                                        <td><?=($val['gender']==1)?'Nam':'Nữ'; ?></td>
                                        <td width="10%"><img src="<?=$val['image']?>" class="img-responsive" alt=""></td>
                                        <td><a href="index.php?action=edit&id=<?=$key ?>">Edit</a></td>
                                        <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa siêu nhân này?')" href="index.php?action=del&id=<?=$key ?>">Delete</a></td>
                                    </tr>

                            <?php    }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
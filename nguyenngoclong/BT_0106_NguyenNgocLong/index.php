<?php
    require ('XuLy.php');
    if(isset($_POST['submitName']))
    {
        $nameEvent = $_POST['txtEventName'];
        $date = $_POST['txtDate'];
        $content = $_POST['txtContent'];
        $xuLy = new XuLy($nameEvent, $date,$content);
        $dateToStart = $xuLy->getDateToStart();
        //echo "<script>alert('Còn '+$dateToStart+' ngày đến bắt đầu sự kiện!');</script>";
        if($xuLy->getNotify() == 1)
        {
            echo "<script>alert('Ghi file thành công, còn '+$dateToStart+' ngày đến bắt đầu sự kiện!');</script>";
        }
        else if($xuLy->getNotify() == 2)
        {
            echo "<script>alert('Sự kiện đã diễn ra 1 ngày, đã đổi tên file!');</script>";
        }
        else if($xuLy->getNotify() == 0)
        {
            echo "<script>alert('Sự kiện đã diễn ra hơn 10 ngày, đã xóa file!');</script>";
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
    <title>Đây là cái form</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <h3>Form sự kiện</h3>
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-4" for="txtEventName">Tên event</label>
                <div class="col-md-8">
                    <input type="text" required class="form-control" name="txtEventName" id="txtEventName" placeholder="Event Name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4" for="txtDate">Ngày tháng</label>
                <div class="col-md-8">
                    <input type="date" required class="form-control" name="txtDate" id="txtDate" placeholder="yyyy-mm-dd">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4" for="txtContent">Nội dung sự kiện</label>
                <div class="col-md-8">
                    <textarea name="txtContent" required class="form-control" placeholder="Content" id="txtContent" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" value="Gửi" name="submitName">
                    <input type="reset" class="btn btn-default" value="Reset Text">
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
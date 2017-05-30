<?php
    require('PhoneNumber.php');
    $listPrefix = array('098', '097', '096', '0169', '0168', '0167', '0166', '0165', '0164', '0163', '0162', '091', '094', '0123', '0124', '0125', '0127', '0129', '090', '093', '0120', '0121', '0122', '0126', '0128');
    if(isset($_POST['submitName']))
    {
        $phoneNumber = $_POST['txtPhoneNumber'];
        $objPhoneNumber = new PhoneNumber($phoneNumber, $listPrefix);
        try
        {
            $notify = $objPhoneNumber->checkPhoneNumber();
        }
        catch (Exception $e)
        {
            $notify = $e->getMessage();
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
    <title>Check phone number</title>
    <style>
        span{
            color: RED;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <table align="center" width="500px;">
            <tr>
                <td colspan="2">
                    <?php
                    echo "Các đầu số kiểm tra: ";
                    echo "<br>";
                    foreach ($listPrefix as $key => $val)
                    {
                        echo $val.", ";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Nhập số điện thoại</td>
                <td><input type="text" name="txtPhoneNumber" placeholder="09xxxxxxx"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo isset($notify)?"<span>$notify</span>":""; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submitName" value="Kiểm tra">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
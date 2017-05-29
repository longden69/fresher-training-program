<?php
session_start();
require('tailieu.php');
require('muon.php');
require('tra.php');
require('Sach.php');
require('Comics.php');
require('QLTV.php');
// Bài 1: Hãy viết một chương trình giúp quản lý 1 thư viện. Trong thư viện có nhiều loại tài liệu bao gồm: sách, báo, tạp chí, truyện, từ điển, …. Các loại tài liệu sẽ có một số thông tin chung và cũng sẽ có những thông tin riêng chỉ loại tài liệu đó có. Thư viện cho phép mượn tài liệu và trả tài liệu. Mỗi loại tài liệu khi mượn cần có các thủ tục khác nhau để đăng ký.
// Yêu cầu: Sử dụng kiến thức về Abstract class, Interface. Inheritance, Overloading, PSR-2 để thực hiện những việc sau:
// -	Có thể thống kê số lượng còn lại trong thư viện của từng loại tài liệu bất cứ lúc nào.
// -	Có thể hiển thị thông tin chi tiết của từng loại tài liệu.
// -	Có thể thống kê tổng số lần đã mượn và trả của từng loại tài liệu.
// -	Có thể hiển thị thông báo khi thực hiện một hành động (gọi function) không tồn tại thay vì báo lỗi.

// Bài 2: (Nâng cao) Dựa trên nội dung bài 1, phát triển thêm các chức năng mới để hoàn thiện hoạt động 1 của thư viện. Ví dụ: nhập kho tài liệu mới, lưu kho tài liệu đã không còn sử dụng nữa, bổ sung dạng tài liệu mới vào thư viện, ……
	
$listDocument = array([
	'tieu_de'=>'Độc cô cầu bại',
	'loai'=>'1',
	'so_trang'=>69,
	'so_luong'=>69,
	'nha_xuat_ban'=>'Panda'
	],
	[
	'tieu_de'=>'Cuốn theo chiều gió',
	'loai'=>'1',
	'so_trang'=>25,
	'so_luong'=>25,
	'nha_xuat_ban'=>'Tôi không biết'
	],
	[
	'tieu_de'=>'Đắc nhẫn tâm',
	'loai'=>'1',
	'so_trang'=>24,
	'so_luong'=>24,
	'nha_xuat_ban'=>'Tôi chịu'
	],
	[
	'tieu_de'=>'Dragon ball',
	'loai'=>'2',
	'so_trang'=>50,
	'so_luong'=>50,
	'nha_xuat_ban'=>'Jav'
	],
	[
	'tieu_de'=>'Onepiece',
	'loai'=>'2',
	'so_trang'=>49,
	'so_luong'=>49,
	'nha_xuat_ban'=>'Echi'
	]);
$listCategory = array(
	1=>'Sách',
	2=>'Truyện tranh'
	);
	$qltv = new QLTV($listDocument);


?>
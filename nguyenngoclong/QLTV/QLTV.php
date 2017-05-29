<?php

/**
* 
*/
class QLTV
{
	protected $listDocument;
	function __construct($listDocument)
	{
		$this->listDocument = $listDocument;
	}

	//Thống kê số lượng
	function thongKeSoLuong($idType)
	{
		$listDocument = $this->listDocument;
		foreach ($listDocument as $key => $val) {
			if($val['loai'] === $idType)
			{
				//Show tài liệu
			}
		}
	}

}
?>
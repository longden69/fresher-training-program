<?php

/**
* 
*/
abstract class TaiLieu
{
	protected $tieude;
	protected $sotrang;
	protected $soluong;
	protected $data;

	abstract function setTenTaiLieu();
	abstract function muonTaiLieu();
	abstract function traTaiLieu();

	function __set($key, $value)
	{
		$this->data[$key] = $value;
	}

	function __get($key)
	{
		return $this->data[$key];
	}

	function setTaiLieu($tieude, $sotrang, $soluong){
		$this->tieude = $tieude;
		$this->sotrang = $sotrang;
		$this->soluong = $soluong;
	}

}
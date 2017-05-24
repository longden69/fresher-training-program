<?php
 	define('PI', 3.14);
class FreserPHP
{
	protected $firstName;
	protected $lastName;
	protected $middleName;
	protected $birthDay;
	protected $phoneNumber;

	/*
	* Input: array $fresherPhp
	*/
	function __construct($fresherPhp)
	{
		$this->firstName = trim($fresherPhp['first_name']);
		$this->lastName = trim($fresherPhp['last_name']);
		$this->middleName = trim($fresherPhp['middle_name']);
		$this->birthDay = trim($fresherPhp['birth_day']);
		$this->phoneNumber = trim($fresherPhp['phone_number']);
	}

	/*
	* Output String
	*/
	function getFullName()
	{
		return $this->lastName ." ". $this->middleName ." ". $this->firstName;	
	}

	/*
	* Output: Int
	*/
	function getAge()
	{
		$birthDay = explode('-', $this->birthDay);
		$birthDay = trim(array_pop($birthDay));	
		return date('Y') - $birthDay;
	}

	/*
	* Output: true/false/String.
	*/
	function getProviderPhone($providerPhone)
	{
		$prefixPhoneNumber = substr($this->phoneNumber, 0, 3);
		$prefixPhoneNumber2 = substr($this->phoneNumber, 0, 4);
		foreach ($providerPhone as $key => $val) {
			if(array_search($prefixPhoneNumber, $val) || array_search($prefixPhoneNumber2, $val))
			{
				return $key;
			}
			
		}
		return 'Not Found Provider';
	}

}

/**
* 
*/
class Until
{
	protected $listFresherPhp;
	/**
	* Input array $fresherPhp
	*/
	function __construct($fresherPhp)
	{
		$this->listFresherPhp = $fresherPhp;
	}

	/**
	* Output array
	*/
	function getMaxAge()
	{
		$listYear = array();
		foreach ($this->listFresherPhp as $key => $val) {
			$listYear[] = $this->getYear($val['birth_day']);
		}
		array_multisort($listYear, $this->listFresherPhp);
		$result[0] = array_shift($this->listFresherPhp);
		$result[1] = array_pop($this->listFresherPhp);

		return $result;
	}

	/**
	* Input string $birthDay
	* Output int
	*/
	function getYear($birthDay)
	{
		$birthDay = explode('-', $birthDay);

		return trim(array_pop($birthDay));	
	}

	/**
	* Input array $providerPhone
	* Output array
	*/
	function getSumFresherForProvider($providerPhone)
	{
		$keyProvider = array();
		foreach ($providerPhone as $key => $val) 
		{
			$keyProvider[$key] = 0;
		}
		foreach ($this->listFresherPhp as $key0 => $val0) {
			$prefixPhoneNumber = substr($val0['phone_number'], 0, 3);
			$prefixPhoneNumber2 = substr($val0['phone_number'], 0, 4);
			foreach ($providerPhone as $key1 => $val1) {
				if(array_search($prefixPhoneNumber, $val1) || array_search($prefixPhoneNumber2, $val1))
				{
					$keyProvider[$key1]++;
				}
			}
		}
		return $this->sortAssocArray($keyProvider);
	}

	/**
	* Input array $arr
	* Output array
	*/
	function sortAssocArray($arr)
	{
		$listValues = array_values($arr);
		array_multisort($listValues, $arr);

		return $arr;
	}	
}
/**
* 
*/
class Circle
{
	protected $r;
	/**
	* Input int $r
	*/
	function __construct($r)
	{
		$this->r = $r;
	}

	/**
	* Output Int
	*/
	function tinhS()
	{
		return PI* $this->r * $this->r;
	}

	/**
	* Output Int
	*/
	function tinhCV()
	{
		return PI * $this->r;
	}		


}
	

	$fresherPhp = array([
		'first_name'=>'Long',
		'last_name'=>'Nguyễn',
		'middle_name'=>'Ngọc',
		'birth_day'=>'28-09-1995',
		'phone_number'=>'0976468826'
		],
		[
		'first_name'=>'Huy',
		'last_name'=>'Bùi',
		'middle_name'=>'Ngọc',
		'birth_day'=>'28-09-2000',
		'phone_number'=>'01286468826'
		],
		[
		'first_name'=>'Tuấn',
		'last_name'=>'Lê',
		'middle_name'=>'Ngọc',
		'birth_day'=>'28-09-2005',
		'phone_number'=>'01286468826'
		],
		[
		'first_name'=>'Thành',
		'last_name'=>'Lê',
		'middle_name'=>'Ngọc',
		'birth_day'=>'28-09-1990',
		'phone_number'=>'01286468826'
		],
		[
		'first_name'=>'Quang',
		'last_name'=>'Lê',
		'middle_name'=>'Ngọc',
		'birth_day'=>'28-09-1989',
		'phone_number'=>'0946468826'
		]
		);
	$providerPhone = array(
		'Viettel'=>['098', '097', '096', '0169', '0168', '0167', '0166', '0165', '0164', '0163', '0162'],
		'Vinaphone'=>['091', '094', '0123', '0124', '0125', '0127', '0129'],
		'Mobiphone'=>['090', '093', '0120', '0122', '0126', '0128'],
		);

	$fresher = new FreserPHP($fresherPhp[0]);
	$until = new Until($fresherPhp);

	//print_r($until->getSumFresherForProvider($providerPhone));
	echo "<br>";
	var_dump($until->getMaxAge());
	echo "<br>";
	echo "Họ và tên: ".$fresher->getFullName();
	echo "<br>";
	echo "Tuổi: ".$fresher->getAge();
	echo "<br>";
	echo $fresher->getProviderPhone($providerPhone);
	echo "<br>";
	// Circle
	$circle = new Circle(4);
	echo "Diện tích: ".$circle->tinhS();
	echo "<br>";
	echo "Chu vi: ".$circle->tinhCV();
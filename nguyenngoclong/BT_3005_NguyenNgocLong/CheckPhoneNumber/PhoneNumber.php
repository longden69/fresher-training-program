<?php

/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 30/05/2017
 * Time: 1:54 CH
 */

class PhoneNumber extends Exception
{
    private $phoneNumber;
    private $listPrefix;
    /**
     * PhoneNumber constructor.
     * @param $number
     */
    public function __construct($number, $arr)
    {
        $this->phoneNumber = $number;
        $this->listPrefix = $arr;
    }

    public function checkPhoneNumber()
    {
        if($this->checkLength() && is_numeric($this->phoneNumber) )
        {
            $prefix1 = substr($this->phoneNumber, 0, 3);
            $prefix2 = substr($this->phoneNumber, 0, 4);
            if (in_array($prefix1, $this->listPrefix) || in_array($prefix2, $this->listPrefix))
            {
                return "OK men !";
            }
            else
            {
                throw new Exception('Không tìm thấy kq');
            }
        }
        else
        {
            throw new Exception('Phải nhập vào dãy số có độ dài từ 10 - 11');
        }
    }

    /**
     * @return bool
     */
    public function checkLength()
    {
        if(strlen($this->phoneNumber) <= 11 && strlen($this->phoneNumber) >= 10)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 01/06/2017
 * Time: 2:21 CH
 */
class XuLy
{
    private $nameEvent;
    private $dateStart;
    private $contentEvent;

    /**
     * XuLy constructor.
     * @param $nameEvent
     * @param $dateStart
     * @param $contentEvent
     */
    public function __construct($nameEvent, $dateStart, $contentEvent)
    {
        $this->nameEvent = $nameEvent;
        $this->dateStart = $dateStart;
        $this->contentEvent = $contentEvent;
    }

    /**
     * @return float
     */
    public function getDateStart()
    {
        $timeDate = strtotime($this->dateStart);
        return ceil(($timeDate)/60/60/24);
    }

    /**
     * @return float
     */
    public function getDateToStart()
    {
        $timeDate = strtotime($this->dateStart);
        return ceil(($timeDate - time())/60/60/24);
    }

    /**
     * @return int
     */
    public function getNotify()
    {
        $filename = 'event.txt';
        $dateToStart = $this->getDateToStart();
        echo $dateToStart;
        if($dateToStart == 0 || $dateToStart == 1)
        {

            $fp = $this->openFile($filename,'a+');
            $data = "Ngày chỉnh sửa: ".date('Y-m-d')."\n Tên sự kiện: ".$this->nameEvent." \n Ngày diễn ra: ".$this->dateStart." \n Nội dung sự kiện: ".$this->contentEvent." \n Còn ".$this->getDateToStart()." ngày đến sự kiện \n";
            fwrite($fp, $data);
            return 1;
        }
        else if ($dateToStart <= -1 && $dateToStart >= -10)
        {
            $fp = $this->openFile($filename,'a+');
            $data = "Ngày chỉnh sửa: ".date('Y-m-d')."\n Tên sự kiện: ".$this->nameEvent." (PASS)"." \n Ngày diễn ra: ".$this->dateStart." \n Nội dung sự kiện: ".$this->contentEvent." \n Còn ".$this->getDateToStart()." ngày đến sự kiện \n";
            fwrite($fp, $data);
            fclose($fp);
            rename($filename,'Pass_'.$filename);
            return 2;
        }
        else if($dateToStart < -10)
        {
            unlink($filename);
            return 0;
        }
    }

    /**
     * @return bool|resource
     */
    public function openFile($filename,$option)
    {
//        $filename = 'event.txt';
        return @fopen($filename, $option);
    }

    /**
     * @param $fp
     * @return array
     */
    public function readFile($fp)
    {
        $arr = [];
        while(!feof($fp))
        {
            $arr[] = fgets($fp);
        }

        return $arr;
    }
}
<?php
namespace Retangle;
/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 30/05/2017
 * Time: 11:24 SA
 */
class Shape
{
    public $widthRectangular;
    public $lengthRectangular;
    
    public function __construct($width, $length)
    {
        $this->lengthRectangular = $length;
        $this->widthRectangular = $width;
    }

    /**
     * @param $widthRectangular
     * @return mixed
     */
    public function getWidthRectangular()
    {
        if(is_numeric($this->widthRectangular) && $this->widthRectangular > 0)
        {
            return $this->widthRectangular;
        }

        return 'Độ dài không hợp lệ';
    }

    /**
     * @param $lengthRectangular
     * @return mixed
     */
    public function getLengthRectangular()
    {
        if(is_numeric($this->lengthRectangular) && $this->lengthRectangular > 0)
        {
            return $this->lengthRectangular;
        }

        return 'Độ dài không hợp lệ';
    }

    /**
     * @param $lengthRectangular
     * @param $widthRectangular
     * @return mixed
     */
    public function getArea()
    {
        if($this->lengthRectangular > 0 && $this->widthRectangular > 0)
        {
            return $this->lengthRectangular * $this->widthRectangular;
        }

        return;
    }

    /**
     * @param $lengthRectangular
     * @param $widthRectangular
     * @return mixed
     */
    public function getDiameter()
    {
        if($this->lengthRectangular > 0 && $this->widthRectangular > 0)
        {
            return ($this->lengthRectangular + $this->widthRectangular) *2;
        }

        return;
    }

}
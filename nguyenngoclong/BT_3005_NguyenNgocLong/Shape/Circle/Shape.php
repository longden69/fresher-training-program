<?php
namespace Circle;
/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 30/05/2017
 * Time: 2:45 CH
 */
class Shape
{
    private $radius;

    /**
     * Shape constructor.
     * @param $r
     */
    public function __construct($r)
    {
        $this->radius = $r;
    }

    /**
     * @return string
     */
    function getRadius()
    {
        if($this->radius > 0)
        {
            return $this->radius;
        }
        else
        {
            return "Độ dài không hợp lệ!";
        }
    }

    /**
     * @return float
     */
    function getArea()
    {
        return pi() * $this->radius * $this->radius;
    }

    /**
     * @return int
     */
    function getDiameter()
    {
        return 2 * pi() * $this->radius;
    }

}
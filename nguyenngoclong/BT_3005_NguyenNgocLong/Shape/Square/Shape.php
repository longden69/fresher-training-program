<?php
namespace Square;


/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 30/05/2017
 * Time: 10:08 SA
 */
class Shape
{
    private $edge;
    function __construct($edge)
    {
        $this->edge = $edge;
    }

    /**
     * @param
     */
    public function getEdge()
    {
        if(is_numeric($this->edge) && $this->edge > 0)
        {
            return $this->edge;
        }

        return "Cạnh nhập vào không hợp lệ.";
    }

    /**
     * @param
     */
    public function getArea()
    {
        if($this->edge > 0)
        {
            return $this->edge * $this->edge;
        }

        return;
    }

    /**
     * @param
     */
    public function getDiameter()
    {
        if($this->edge > 0)
        {
            return $this->edge * 4;
        }

        return;
    }
}
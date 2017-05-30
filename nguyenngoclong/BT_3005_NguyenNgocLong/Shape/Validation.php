<?php

/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 30/05/2017
 * Time: 10:21 SA
 */
class Validation
{
    protected function checkEdge($edge)
    {
        return (is_numeric($edge) &&  $edge > 0);
    }
}
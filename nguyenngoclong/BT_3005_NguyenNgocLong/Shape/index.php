<?php
/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 30/05/2017
 * Time: 10:08 SA
 */
require ('Square/Shape.php');
require ('Rectangle/Shape.php');
require ('Circle/Shape.php');

use Square as square;
use Retangle as retange;
use Circle as circle;

$shapeSquare = new square\Shape(12);

echo "Hình vuông: <br>";
echo "Độ dài cạnh: ".$shapeSquare->getEdge()."<br>";
echo "Chu vi là: ".$shapeSquare->getDiameter()."<br>";
echo "Diện tích là: ".$shapeSquare->getArea()."<br>";
echo "<br>";
echo "<hr>";
echo "Hình chữ nhật: "."<br>";
$shapeRetange = new retange\Shape(9, 8);
echo "Độ dài 2 cạnh là: ".$shapeRetange->getWidthRectangular().", ".$shapeRetange->getLengthRectangular()."<br>";
echo "Chu vi là: ".$shapeRetange->getDiameter()."<br>";
echo "Diện tích là: ".$shapeRetange->getArea()."<br>";
echo "<hr>";
echo "Hình tròn: "."<br>";
$shapeCircle = new circle\Shape(9);
echo "Bán kính là: ".$shapeCircle->getRadius()."<br>";
echo "Chu vi là: ".$shapeCircle->getDiameter()."<br>";
echo "Diện tích là: ".$shapeCircle->getArea()."<br>";
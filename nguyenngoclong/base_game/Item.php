<?php
require('Wepon.php');
require('Armor.php');

/**
* 
*/
Abstract class Item implements Wepon, Armor
{
	protected $damageWepon;
	protected $criticalWepon;
	protected $defenseArmor;
	protected $blockArmor;

	/**
	* 
	*/
	function __construct()
	{
		# code...
	}

	/**
	* 
	*/
	Abstract function attack();

	/**
	* 
	*/
	Abstract function defense();
}
?>
<?php
	// A weapon must have: damage (in number, increase base damage of the unit) and critical hit (percentage to double the current damage of the unit using it).
	// An armor must have: defense (in number, increase base defense of the unit) and block (percentage to completely block the damage from the enemy)
	// Equip two units a weapon and an armor and put them into a battlefield of while loop (only one unit can attack at a time), letting them fighting each other until one of their health is 0. Printing out the details for each turn.
	// VD: 	 equipped with Dragon blade and Dark Armor (health: 150, damage: 22, defense: 7, critical hit: 30%, block: 10%)
	// Soldier equipped with Excalibur and ChainMail (health: 110, damage: 33, defense: 4, critical hit: 20%, block: 12%)
	// Turn 1: Knight dealt 18 (22 - 4) damage to Soldier
	// Turn 2: Soldier dealt a critical hit of 52 ((33 - 7) * 2) damage to Knight.
	// Turn 3: Knight attacked Soldier but his attack has been blocked.
	// ...
	// Turn 100: Knight has been defeated by Soldier.
	// NOTE: using OOP for this task.
require('Item.php');
/**
* 
*/
class Unit extends Item
{
	protected $sodier1;
	protected $sodier2;
	protected $heathUnit;
	protected $damageUnit;
	protected $defenseUnit;

	/**
	* 
	*/
	function __construct($sodier1, $sodier2)
	{
		$this->sodier1 = $sodier1;
		$this->sodier2 = $sodier2;
	}

	/**
	* 
	*/
	function attack()
	{
		$sodier1 = $this->sodier1;
		$sodier2 = $this->sodier2;
		$heath[1] = $sodier1['heath'];
		$heath[-1] = $sodier2['heath'];
		$turn = 1;
		$stt = 0;
		do
		{
			$stt++;
			if($turn == 1)
			{
				$sodierAttack = $sodier1;
				$sodierDefense = $sodier2;
			}
			else
			{
				$sodierAttack = $sodier2;
				$sodierDefense = $sodier1;
			}
			$damageAttack = $this->damageAttack($sodierAttack['damage'], $sodierAttack['damage_wepon'] );
			$damageDefense = $this->damageDefense($sodierDefense['defense'], $sodierDefense['defense_armor']);
			$crit = $sodierAttack['critical'];
			$block = $sodierDefense['block'];
			$damageWhenAttack =  $this->getDamageWhenAttack($damageAttack, $damageDefense, $crit, $block);

			$heath[$turn] = $heath[$turn] - $damageWhenAttack ;
			if($heath[$turn] <= 0)
				$heath[$turn] = 0;
			echo "Turn: ".$stt."<br>";
			echo "Nhân vật tấn công: ".$sodierAttack['name']."<br>";
			echo "Damage: ".$damageWhenAttack."<br>";
			echo "Hp của ".$sodierDefense['name'].' sau turn '.$stt.': '.$heath[$turn]."<br>";
			echo "Hp của ".$sodierAttack['name'].' sau turn '.$stt.': '.$heath[-$turn]."<br>";
			echo "<hr>";
			$turn = -$turn;

		}while ($heath[-$turn] > 0);
	}

	/**
	* Return Damage attack
	*/
	function getDamageWhenAttack($damageAttack, $damageDefense, $crit, $block)
	{
		if($this->isCritical($crit))
		{
			return (($damageAttack - $damageDefense)*2);
		}
		if($this->isBlock($block))
		{
			return 0;
		}

		return ($damageAttack - $damageDefense);
	}

	/**
	* 
	*/
	function defense()
	{
		
	}

	/**
	* 
	*/
	function damageAttack($damageUnit, $dataWepon)
	{
		return ($damageUnit + $dataWepon);
	}

	/**
	* 
	*/
	function damageDefense($armorUnit, $armorWeapon)
	{
		return ($armorUnit + $armorWeapon);
	}

	/**
	* 
	*/
	function isCritical($crit)
	{
		if(rand(0,100) <= $crit)
		{
			return true;
		}

		return false;
	}

	/**
	* 
	*/
	function isBlock($block)
	{
		if(rand(0,100) <= $block)
		{
			return true;
		}

		return false;
	}

}
?>
<?php
	// Write a simple turn-based game in which there are two units fighting to death using various types of weapons and armors
	// An unit must have 3 properties: base health, base damage and base defense.
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
	
	//------------------->
	//=--> Class: Unit{heath, damage, defense}

	//=--> Class: Wepon{damage(in number, increase base damage og the unit), critical hit(percentage to completely block the damage from enemy)}
	//=--> Class: Armor{defense(in number, increase base defense of the unit) block(pecentage to complely block the damge from the enemy )}

	//=--> Class: Equip: {{Wepon, Armor}}

		$sodier = [
			'name'=>'Sodier',
			'heath'=>100,
			'damage'=>30,
			'defense'=>10,
			'damage_wepon'=>20,
			'critical'=>10,
			'defense_armor'=>10,
			'block'=>1
			];
		$wizard = [
			'name'=>'Wizard',
			'heath'=>100,
			'damage'=>40,
			'defense'=>5,
			'damage_wepon'=>25,
			'critical'=>20,
			'defense_armor'=>10,
			'block'=>1
			];
	require('Unit.php');
	echo "Bắt đầu: <br>";
	echo "Tên unit 1: ".$sodier['name']."<br>";
	echo "Hp unit 1: ".$sodier['heath']."<br>";
	echo "Damage unit 1: ".$sodier['damage']."<br>";
	echo "Defense unit 1: ".$sodier['defense']."<br>";
	echo "Damage wepon unit 1: ".$sodier['damage_wepon']."<br>";
	echo "Tỉ lệ critical unit 1: ".$sodier['critical']."<br>";
	echo "Defense armor unit 1: ".$sodier['defense_armor']."<br>";
	echo "Tỉ lệ block unit 1: ".$sodier['block']."<br>";
	echo "<br>";
	echo "Tên unit 2: ".$wizard['name']."<br>";
	echo "Hp unit 2: ".$wizard['heath']."<br>";
	echo "Damage unit 2: ".$wizard['damage']."<br>";
	echo "Defense unit 2: ".$wizard['defense']."<br>";
	echo "Damage wepon unit 2: ".$wizard['damage_wepon']."<br>";
	echo "Tỉ lệ critical unit 2: ".$wizard['critical']."<br>";
	echo "Defense armor unit 2: ".$wizard['defense_armor']."<br>";
	echo "Tỉ lệ block unit 2: ".$wizard['block']."<br>";
	echo "<hr>";
	$unit = new Unit($sodier, $wizard);
	$unit->attack();
	echo "<br>";
	//$unit->defense();
?>
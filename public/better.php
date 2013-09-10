<?php
include "../init.php";

$greenMushroom = new MW_Powerup_Mushroom_NoPain();
$knife         = new MW_Powerup_Sword_Little();
$fucker        = new MW_Powerup_Sword_Fucker();

//Preparar Manos
$gil = new MW_Mano('Gil');
$gil->setAtk(10);
$gil->setDef(8);
echo "<pre>";
echo 'Mano '. $gil->getName() . ' pronto para combater. Atk: '.$gil->getAtk().' / Def: '.$gil->getDef() . PHP_EOL;

$brown = new MW_Mano('Brown');
$brown->setAtk(11);
$brown->setDef(9);
$brown->addPowerup($knife);
$brown->addPowerup($greenMushroom);
$brown->addPowerup($fucker);

echo 'Mano '. $brown->getName() . ' pronto para combater. Atk: '.$brown->getAtk().' / Def: '.$brown->getDef() . PHP_EOL;

//Batalha!
$battle = new MW_Battle($gil, $brown);

echo "Round 1" . PHP_EOL;
echo "Fight!" . PHP_EOL;

echo $battle->fight();

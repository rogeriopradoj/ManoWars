<?php
/**
 * Little sword powerup.
 *
 * @package ManoWars
 * @author Augusto Pascutti
 */
class MW_Powerup_Sword_Little implements MW_Powerup_Interface
{
    public function getHealthChange()
    {
        return 0;
    }
    public function getAttackChange()
    {
        return 5;
    }
    public function getDefenceChange()
    {
        return 1;
    }
}
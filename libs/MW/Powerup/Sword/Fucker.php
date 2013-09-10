<?php
/**
 * Fucker sword powerup.
 *
 * @package ManoWars
 * @author Augusto Pascutti
 */
class MW_Powerup_Sword_Fucker implements MW_Powerup_Interface
{
    public function getHealthChange()
    {
        return 0;
    }
    public function getAttackChange()
    {
        return 50;
    }
    public function getDefenceChange()
    {
        return 10;
    }
}
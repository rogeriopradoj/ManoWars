<?php
/**
 * No Pain mushroom powerup.
 *
 * @package ManoWars
 * @author Augusto Pascutti
 */
class MW_Powerup_Mushroom_NoPain implements MW_Powerup_Interface
{
    public function getHealthChange()
    {
        return 100;
    }
    public function getAttackChange()
    {
        return -5;
    }
    public function getDefenceChange()
    {
        return -10;
    }
}
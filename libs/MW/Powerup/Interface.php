<?php
/**
 * Powerup interface
 *
 * @package ManoWars
 * @author Augusto Pascutti
 */
interface MW_Powerup_Interface
{
    /**
     * Returns the health difference
     *
     * @return int
     * @author Augusto Pascutti
     */
    public function getHealthChange();
    /**
     * Returns the attack difference
     *
     * @return int
     * @author Augusto Pascutti
     */
    public function getAttackChange();
    /**
     * Returns the defence difference
     *
     * @return int
     * @author Augusto Pascutti
     */
    public function getDefenceChange();
}
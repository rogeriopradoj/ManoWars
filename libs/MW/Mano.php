<?php
/**
 * "Mano de briga"
 *
 * @package Mano Wars
 * @author Rafael Dohms
 * @author Augusto Pascutti
 */
class MW_Mano
{
    private $name;
    private $atk;
    private $def;
    private $health;
    /**
     * Powerups of this mano to be applyed.
     * While they are here, they don;t affect in all
     * any of the attributes of this mano. For this
     * call applyPowerups() or reset its health.
     *
     * @var array
     */
    private $powerups;
    
    /**
     * Constructor
     * 
     * @param string $name
     * @author Rafael Dohms
     */
    function __construct ($name)
    {
        $this->setName($name);
        $this->resetPowerups();
        $this->resetHealth();
    }
    
    public function attack(MW_Mano $victim)
    {
        $atk = $this->getAtk() + $this->getRandom();
        $def = $victim->defend();
        
        $dmgMultiplier = $this->getRandom(1,100)/100;
        
        if ($atk > $def){
            $dmg = round($atk * $dmgMultiplier);
            $victim->hurt( $dmg );
            $action = "%s did %d damage on %s";
        }else{
            $dmg = round($def * $dmgMultiplier);
            $this->hurt( $dmg );
            $action = "%s took %d damage from %s";
            
        }
        
        return sprintf($action, $this->getName(), $dmg, $victim->getName());
    }
    
    /**
     * Returns the defend factor with randomness beauty.
     *
     * @return int
     * @author Augusto Pascutti
     */
    public function defend()
    {
        return $this->getDef() + $this->getRandom();
    }
    
    /**
     * Returns a random factor.
     *
     * @param int $min 
     * @param int $max 
     * @return int
     * @author Rafael Dohms
     */
    public function getRandom($min = 1, $max = 10)
    {
        return mt_rand($min, $max);
    }
    
    /**
     * Reset health and apply existing powerups.
     *
     * @return void
     * @author Rafael Dohms
     */
    public function resetHealth()
    {
        $this->health = 100;
        $this->applyPowerups();
    }
    
    /**
     * Hurts this "mano"
     *
     * @param int $damage 
     * @return void
     * @author Augusto Pascutti
     */
    public function hurt($damage)
    {
        $this->health = $this->health - $damage;
    }
    
    /**
     * If the "mano" is still alive
     *
     * @return boolean
     * @author Rafael Dohms
     */
    public function isAlive()
    {
        return ($this->health > 0);
    }
    
	/**
     * @param int $def the $def to set
     */
    public function setDef($def)
    {
        $this->def = $def;
    }

	/**
     * @param int $atk the $atk to set
     */
    public function setAtk($atk)
    {
        $this->atk = $atk;
    }
    /**
     * Changes the current defence.
     * This method sums the current defence with the given integer.
     *
     * @param int $num 
     * @return void
     * @author Augusto Pascutti
     */
    public function changeDef($num)
    {
        $def  = $this->getDef();
        $def += $num;
        $this->setDef($def);
    }
    /**
     * Changes the attack.
     * This method sums the current defence with the given integer.
     *
     * @param int $num 
     * @return void
     * @author Augusto Pascutti
     */
    public function changeAtk($num)
    {
        $atk  = $this->getAtk();
        $atk += $num;
        $this->setAtk($num);
    }
    
	/**
	 * Defines the name of this "mano".
	 * 
     * @param string $name the $name to set
     * @author Rafael Dohms
     */
    public function setName($name)
    {
        $this->name = $name;
    }

	/**
	 * Returns the name of this "mano".
	 * 
     * @return int
     * @author Rafael Dohms
     */
    public function getName()
    {
        return $this->name;
    }

	/**
	 * Returns the defence.
	 * 
     * @return int
     * @author Rafael Dohms
     */
    public function getDef()
    {
        return (int) $this->def;
    }
    

	/**
	 * Returns the attack.
	 * 
     * @return int
     * @author Rafael Dohms
     */
    public function getAtk()
    {
        return (int) $this->atk;
    }
    
    /**
     * Returns the health.
     *
     * @return int
     * @author Rafael Dohms
     */
    public function getHealth()
    {
        return $this->health;
    }
    
    /**
     * Resets the powerups.
     *
     * @return void
     * @author Augusto Pascutti
     */
    protected function resetPowerups()
    {
        $this->powerups = array();
    }
    
    public function getPowerups()
    {
        return $this->powerups;
    }
    
    /**
     * Adds a powerup to the mano.
     *
     * @param MW_Powerup_Interface $item 
     * @return void
     * @author Augusto Pascutti
     */
    public function addPowerup(MW_Powerup_Interface $item)
    {
        $this->powerups[] = $item;
    }
    
    /**
     * Apply the existing powerups to the "mano".
     *
     * @return void
     * @author Augusto Pascutti
     */
    protected function applyPowerups()
    {
        foreach ($this->powerups as $power) {
            $this->health += $power->getHealthChange();
            $this->changeDef($power->getDefenceChange());
            $this->changeAtk($power->getAttackChange());
        }
        $this->resetPowerups();
    }
}
?>
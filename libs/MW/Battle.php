<?php
/**
 * Battle class
 *
 * @package Mano Wars
 * @author Rafael Dohms
 */
class MW_Battle
{
    /**
     * Member of fight.
     *
     * @var MW_Mano
     */
    private $manoA;
    
    /**
     * Another member of the fight.
     *
     * @var MW_Mano
     */
    private $manoB;
    
    /**
     * Constructor
     *
     * @param MW_Mano $manoA 
     * @param MW_Mano $manoB 
     * @author Rafael Dohms
     */
    public function __construct($manoA, $manoB)
    {
        $this->setManoA($manoA);
        $this->setManoB($manoB);
    
        $this->manoA->resetHealth();
        $this->manoB->resetHealth();
        
    }
    
    /**
     * Starts the fight.
     *
     * @return string
     * @author Rafael Dohms
     */
    public function fight()
    {
        while($this->manoA->isAlive() && $this->manoB->isAlive()){
            echo $this->manoA->attack($this->manoB) . PHP_EOL;
        }
        
        if ($this->manoA->isAlive()){
            return $this->manoA->getName() . " won!" . PHP_EOL;
        }else{
            return $this->manoB->getName() . " won!" . PHP_EOL;
        }
        
    }
    
    
	/**
	 * Defines "mano" B.
	 *
     * @param MW_Mano $manoB
     */
    public function setManoB(MW_Mano $manoB)
    {
        $this->manoB = $manoB;
    }

	/**
	 * Defines "mano" A.
	 * 
     * @param MW_Mano $manoA
     */
    public function setManoA(MW_Mano $manoA)
    {
        $this->manoA = $manoA;
    }

	/**
	 * Returns "Mano" A.
	 *
     * @return MW_Mano
     */
    public function getManoB()
    {
        return $this->manoB;
    }

	/**
	 * Returns "Mano" B
	 *
     * @return MW_Mano
     */
    public function getManoA()
    {
        return $this->manoA;
    }
 
    
    
}

?>
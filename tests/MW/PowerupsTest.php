<?php
/**
 * MW_Mano test case.
 */
class MW_PowerupsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var MW_Mano
     */
    private $MW_Mano;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated MW_ManoTest::tearDown()
        $this->MW_Mano = null;
        parent::tearDown();
    }
    
    /**
     * Provider for powerups
     *
     * @return array
     * @author Augusto Pascutti
     */
    public function powerupProvider()
    {
        return array(
            array('MW_Powerup_Mushroom_NoPain'),
            array('MW_Powerup_Sword_Fucker'),
            array('MW_Powerup_Sword_Little'),
        );
    }
    
    /**
     * Test instance
     *
     * @dataProvider powerupProvider
     * @package default
     * @author Augusto Pascutti
     */
    public function testPowerupInstance($class)
    {
        $o = new $class();
        $this->assertInstanceOf('MW_Powerup_Interface',$o);
    }
    
    /**
     * Test getters
     *
     * @dataProvider powerupProvider
     * @package default
     * @author Augusto Pascutti
     */
    public function testPowerupGetters($class)
    {
        $o = new $class();
        $this->assertInternalType('int',$o->getHealthChange());
        $this->assertInternalType('int',$o->getAttackChange());
        $this->assertInternalType('int',$o->getDefenceChange());
    }
}
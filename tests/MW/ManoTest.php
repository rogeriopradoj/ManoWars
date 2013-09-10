<?php
/**
 * MW_Mano test case.
 */
class MW_ManoTest extends PHPUnit_Framework_TestCase
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
     * Tests MW_Mano->__construct()
     */
    public function testConstruct()
    {
        $name = "Gil";
        $this->MW_Mano = new MW_Mano($name);
        
        $this->assertInstanceOf('MW_Mano', $this->MW_Mano);
        $this->assertEquals(0, $this->MW_Mano->getAtk());
        $this->assertEquals(0, $this->MW_Mano->getDef());
        $this->assertEquals($name, $this->MW_Mano->getName());
    }

    public function testResetHealth()
    {
        $this->MW_Mano = new MW_Mano('Gil');
        
        $this->MW_Mano->resetHealth();
        
        $this->assertEquals(100, $this->MW_Mano->getHealth());
    }
    
    public function testHurt()
    {
        $this->MW_Mano = new MW_Mano('Gil');
        
        $this->MW_Mano->resetHealth();
        
        $this->MW_Mano->hurt( 50 );
        
        $this->assertEquals(50, $this->MW_Mano->getHealth());
    }
    
    public function testIsAlive(){
        $this->MW_Mano = new MW_Mano('Gil');
        $this->MW_Mano->resetHealth();
        
        //Verificar vivo ao nascer        
        $this->assertTrue($this->MW_Mano->isAlive());
        
        //Verificar vivo apos se machucar
        $this->MW_Mano->hurt( 50 );
        $this->assertTrue($this->MW_Mano->isAlive());

        //Verificar vivo ap—s apanhar ate a morte
        $this->MW_Mano->hurt( 50 );
        $this->assertFalse($this->MW_Mano->isAlive());
        
    }
    
    /**
     * Tests MW_Mano->defend()
     */
    public function testDefend()
    {
        $this->MW_Mano = new MW_Mano('Gil');
        $this->MW_Mano->setDef(5);
        
        $this->assertEquals(5, $this->MW_Mano->getDef());
        
        $sgth = $this->MW_Mano->defend();
        
        $this->assertGreaterThan(5, $sgth);
        
    }
    
    /**
     * Tests MW_Mano->attack()
     * 
     * Remove random luck bonus and puts Manos head to head
     */
    public function testDefendWithoutLuck()
    {
        //Obter Mock
        $manoMock = $this->getMock('MW_Mano',array('getRandom'), array('John'));
        //Definir que o objeto retorne zero.
        $manoMock->expects($this->any())
                 ->method('getRandom')
                 ->will($this->returnValue(0));
        
        //Definir defesa
        $manoMock->setDef(5);
                 
        //Verificar que defesa nao se altera
        $this->assertEquals(5, $manoMock->defend());
    }
    
    /**
     * Tests MW_Mano->attack()
     * 
     * @dataProvider provideForAttack
     */
    public function testAttackWithoutLuck($atk, $def, $expectedResult)
    {
        //Vitima
        //Obter Mock
        $victMock = $this->getMock('MW_Mano',array('defend'), array('John'));
        //Definir que o objeto retorne zero.
        $victMock->expects($this->any())
                 ->method('defend')
                 ->will($this->returnValue($def));

                 
         //Atacante
        //Obter Mock
        $manoMock = $this->getMock('MW_Mano',array('getRandom'), array('Gil'));
        //Definir que o objeto retorne zero.
        $manoMock->expects($this->any())
                 ->method('getRandom')
                 ->will($this->returnValue(0));
        $manoMock->setAtk($atk);
         
         $this->assertContains($expectedResult, $manoMock->attack($victMock));
    }
    
    public function provideForAttack()
    {
        return array(
            array(5, 10, 'took'),
            array(15, 10, 'did'),
            array(5, 5, 'took'),
        );
    }
}


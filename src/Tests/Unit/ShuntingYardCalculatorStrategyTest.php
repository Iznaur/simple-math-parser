<?php


namespace Iznaur\SimpleMathParserBundle\Tests\Unit;


use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Lexer;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\ShuntingYardCalculatorStrategy;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class ShuntingYardCalculatorStrategyTest extends TestCase
{


    public function testPositiveIntegerCalculations()
    {
        $shuntingYardCalculator = new ShuntingYardCalculatorStrategy(new Lexer());

        $this->assertEquals(4, $shuntingYardCalculator->evaluate('1 + 3'));
        $this->assertEquals(6, $shuntingYardCalculator->evaluate('2 * 3'));
        $this->assertEquals(2, $shuntingYardCalculator->evaluate('6 / 3'));
        $this->assertEquals(3, $shuntingYardCalculator->evaluate('6 - 3'));
    }

    public function testNegativeIntegerCalculations()
    {
        $shuntingYardCalculator = new ShuntingYardCalculatorStrategy(new Lexer());

        $this->assertEquals(-4, $shuntingYardCalculator->evaluate('-1 + -3'));
        $this->assertEquals(6, $shuntingYardCalculator->evaluate('-2 * -3'));
        $this->assertEquals(2, $shuntingYardCalculator->evaluate('-6 / -3'));
        $this->assertEquals(-3, $shuntingYardCalculator->evaluate('-6 - -3'));
        $this->assertEquals(-1, $shuntingYardCalculator->evaluate('2 - 3'));
        $this->assertEquals(1, $shuntingYardCalculator->evaluate('-2 + 3'));
    }

    public function testPositiveFloatCalculations()
    {
        $shuntingYardCalculator = new ShuntingYardCalculatorStrategy(new Lexer());

        $this->assertEquals(0.4, $shuntingYardCalculator->evaluate('0.1 + 0.3'));
        $this->assertEquals(0.03, $shuntingYardCalculator->evaluate('0.1 * 0.3'));
        $this->assertEquals(1, $shuntingYardCalculator->evaluate('0.3 / 0.3'));
        $this->assertEquals(0.2, $shuntingYardCalculator->evaluate('0.3 - 0.1'));
        $this->assertEquals(2, $shuntingYardCalculator->evaluate('-0.1 + 2.1'));
    }

    public function testNegativeFloatCalculations()
    {
        $shuntingYardCalculator = new ShuntingYardCalculatorStrategy(new Lexer());

        $this->assertEquals(0.0, $shuntingYardCalculator->evaluate('-0.1 - -0.1'));
        $this->assertEquals(0.06, $shuntingYardCalculator->evaluate('-0.2 * -0.3'));
        $this->assertEquals(1, $shuntingYardCalculator->evaluate('-0.3 / -0.3'));
        $this->assertEquals(-0.4, $shuntingYardCalculator->evaluate('-0.3 + -0.1'));
    }

    public function testIncorrectMathExpressionExceptions()
    {
        $shuntingYardCalculator = new ShuntingYardCalculatorStrategy(new Lexer());

        $this->expectException(\InvalidArgumentException::class);
        $shuntingYardCalculator->evaluate('3 + 3 +');

    }

    public function testIncorrectTokenException()
    {

        $shuntingYardCalculator = new ShuntingYardCalculatorStrategy(new Lexer());

        $this->expectException(\InvalidArgumentException::class);
        $shuntingYardCalculator->evaluate('3 + 3 4');
    }
}
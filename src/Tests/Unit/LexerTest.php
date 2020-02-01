<?php


namespace Iznaur\SimpleMathParserBundle\Tests\Unit;

use InvalidArgumentException;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Lexer;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operand;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operator\Minus;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class LexerTest extends TestCase
{

    public function testTokenize()
    {
        $lexer = new Lexer();

        $result = $lexer->tokenize([1, '-', 4]);
        $this->assertCount(3, $result);
        $this->assertEquals($lexer->tokenize([1, 4, '-']), [new Operand(1), new Operand(4), new Minus()]);
    }


    public function testException()
    {
        $lexer = new Lexer();
        $this->expectException(InvalidArgumentException::class);
        $lexer->tokenize([1, 'a']);
    }
}
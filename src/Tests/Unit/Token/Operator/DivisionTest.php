<?php


namespace Iznaur\SimpleMathParserBundle\Tests\Unit\Token\Operator;

use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operator\Division;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;


class DivisionTest extends TestCase
{


    public function testDivision()
    {
        $division = new Division();

        $this->assertEquals(2, $division->evaluate(6, 3));

        $this->expectException(\DivisionByZeroError::class);

        $division->evaluate(3, 0);
    }
}
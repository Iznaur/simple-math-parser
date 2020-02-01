<?php

namespace Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operator;

use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operand;

class Multiplication extends AbstractOperator
{

    protected int $precedence = 2;

    /**
     * @inheritDoc
     */
    public function evaluate($leftOperand, $rightOperand)
    {
        return $leftOperand * $rightOperand;
    }

    public static function isOperatorSign(string $value): bool
    {
        return '*' === $value;
    }
}
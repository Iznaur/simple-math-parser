<?php

namespace Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operator;

use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operand;

class Division extends AbstractOperator
{

    protected int $precedence = 2;

    /**
     * @inheritDoc
     */
    public function evaluate($leftOperand, $rightOperand)
    {
        if (0 == $rightOperand) {
            throw new \DivisionByZeroError("division by zero");
        }
        return $leftOperand / $rightOperand;
    }

    public static function isOperatorSign(string $value): bool
    {
        return '/' === $value;
    }
}
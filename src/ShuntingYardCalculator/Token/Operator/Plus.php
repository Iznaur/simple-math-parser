<?php

namespace Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operator;

use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operand;

class Plus extends AbstractOperator
{

    protected int $precedence = 1;

    /**
     * @inheritDoc
     */
    public function evaluate($leftOperand, $rightOperand)
    {
        return $leftOperand + $rightOperand;
    }

    public static function isOperatorSign(string $value): bool
    {
        return '+' === $value;
    }
}
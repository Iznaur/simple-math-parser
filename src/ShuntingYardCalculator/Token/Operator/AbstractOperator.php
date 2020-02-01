<?php

namespace Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operator;

use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Token;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operand;

abstract class AbstractOperator implements Token
{
    protected int $precedence = 0;

    public function getPrecedence()
    {
        return $this->precedence;
    }

    abstract public static function isOperatorSign(string $value): bool;

    /**
     * @param float|int $leftOperand
     * @param float|int $rightOperand
     * @return float|int
     */
    abstract public function evaluate($leftOperand, $rightOperand);

}
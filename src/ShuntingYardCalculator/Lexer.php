<?php

namespace Iznaur\SimpleMathParserBundle\ShuntingYardCalculator;

use InvalidArgumentException;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operand;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operator\OperatorFactory;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Token;

class Lexer
{
    public function tokenize(array $expression)
    {
        /**
         * @var $tokens Token[]
         */
        $tokens = [];

        foreach ($expression as $value) {
            if (Operand::isOperand($value)) {
                $tokens[] = new Operand($value);
            } elseif ($operator = OperatorFactory::factory($value)) {
                $tokens[] = $operator;
            } else {
                throw new InvalidArgumentException(sprintf("undefined token: %s", $value));
            }
        }

        return $tokens;
    }
}
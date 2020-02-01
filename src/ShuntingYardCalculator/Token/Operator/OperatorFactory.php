<?php

namespace Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operator;

class OperatorFactory
{
    /**
     * @param string $value
     * @return false|AbstractOperator
     */
    public static function factory(string $value)
    {

        switch (true) {
            case Multiplication::isOperatorSign($value):
                return new Multiplication();
                break;

            case Division::isOperatorSign($value);
                return new Division();
                break;

            case Plus::isOperatorSign($value);
                return new Plus();
                break;

            case Minus::isOperatorSign($value);
                return new Minus();
                break;

            default:
                return false;
                break;
        }
    }
}
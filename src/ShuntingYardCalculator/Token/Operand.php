<?php


namespace Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token;

class Operand implements Token
{
    /**
     * @var int|float
     */
    private $value;

    /**
     * Operand constructor.
     * @param int|float $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }


    public static function isOperand($token): bool
    {
        return is_numeric($token);
    }

    /**
     * @return float|int
     */
    public function getValue()
    {
        return $this->value;
    }
}
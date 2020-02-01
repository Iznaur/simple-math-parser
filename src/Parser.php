<?php

namespace Iznaur\SimpleMathParserBundle;

class Parser
{
    /**
     * @var CalculatorStrategyInterface
     */
    private CalculatorStrategyInterface $calculatorStrategy;

    public function __construct(CalculatorStrategyInterface $calculatorStrategy)
    {
        $this->calculatorStrategy = $calculatorStrategy;
    }

    public function calculate(string $string)
    {
        return $this->calculatorStrategy->evaluate($string);
    }
}
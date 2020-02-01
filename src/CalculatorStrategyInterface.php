<?php

namespace Iznaur\SimpleMathParserBundle;


interface CalculatorStrategyInterface
{
    /**
     * @param string $string
     * @return float|int
     */
    public function evaluate(string $string);
}
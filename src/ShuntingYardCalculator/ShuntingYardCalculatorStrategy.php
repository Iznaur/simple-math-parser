<?php

namespace Iznaur\SimpleMathParserBundle\ShuntingYardCalculator;


use InvalidArgumentException;
use Iznaur\SimpleMathParserBundle\CalculatorStrategyInterface;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operand;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Operator\AbstractOperator;
use Iznaur\SimpleMathParserBundle\ShuntingYardCalculator\Token\Token;
use SplStack;

class ShuntingYardCalculatorStrategy implements CalculatorStrategyInterface
{
    /**
     * @var Lexer
     */
    private Lexer $lexer;


    public function __construct(Lexer $lexer)
    {
        $this->lexer = $lexer;
    }

    /**
     * @inheritDoc
     */
    public function evaluate($expression)
    {

        $tokens = $this->lexer->tokenize(explode(' ', $expression));
        $postfix = $this->convertInfixToPostfix($tokens);

        return $this->evaluatePostfix($postfix);
    }


    private function convertInfixToPostfix(array $tokens): array
    {
        $postfix = [];
        $stack = new SplStack();

        foreach ($tokens as $token) {
            if ($token instanceof Operand) {
                $postfix[] = $token;
            } elseif ($token instanceof AbstractOperator) {
                /**
                 * @var $operator AbstractOperator
                 */
                while (!$stack->isEmpty() &&
                    (($operator = $stack->top()) && $operator->getPrecedence() >= $token->getPrecedence())) {
                    $postfix[] = $stack->pop();
                }
                $stack->push($token);
            } else {
                throw new InvalidArgumentException(sprintf("invalid token: %s", $token));
            }
        }

        while (!$stack->isEmpty()) {
            $postfix[] = $stack->pop();
        }

        return $postfix;
    }

    /**
     * @param array|Token[] $postfix
     * @return float|int
     */
    private function evaluatePostfix(array $postfix)
    {
        $stack = new SplStack();

        foreach ($postfix as $token) {
            if ($token instanceof Operand) {
                $stack->push($token->getValue());
            }

            if ($token instanceof AbstractOperator) {
                if ($stack->count() < 2) {
                    throw new InvalidArgumentException("The input string is incorrect math expression");
                }
                $rightOperand = $stack->pop();
                $leftOperand = $stack->pop();

                $stack->push($token->evaluate($leftOperand, $rightOperand));
            }
        }
        if ($stack->count() > 1) {
            throw new InvalidArgumentException("The input string is incorrect math expression");
        }

        return $stack->pop();
    }
}
<?php declare(strict_types=1);

/**
 * Class LongAddition
 */
final class LongAddition
{
    /**
     * @param string $leftOperand
     * @param string $rightOperand
     * @return string
     */
    public function add(string $leftOperand, string $rightOperand): string
    {
        $x = str_split($leftOperand);
        $y = str_split($rightOperand);

        $buffer = 0;

        $result = [];

        while (count($x) || count($y)) {
            $iterationResult = array_pop($x) + array_pop($y) + $buffer;

            $stringIterationResult = (string)$iterationResult;

            if ($iterationResult >= 10) {
                $buffer = 1;
                $stringIterationResult = substr($stringIterationResult, -1);
            } else {
                $buffer = 0;
            }

            array_unshift($result, $stringIterationResult);
        }

        $buffer && array_unshift($result, '1');

        return ltrim(
            implode($result),
            '0'
        );
    }
}

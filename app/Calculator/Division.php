<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract implements OperationInterface
{
    public function calculate() {
        $count = count($this->operands);

        if ($count === 0) {
            throw new NoOperandsException;
        }

        /*
        $result = $this->operands[0];
        $i = 1;
        while ($i < $count) {
            $result = $result / $this->operands[$i++];
        }
        return $result;
        */

        return array_reduce(array_filter($this->operands), function ($a, $b) {
            if ($a !== null && $b !== null) {
                return $a / $b;
            }

            return $b;
        }, null);

    }
}
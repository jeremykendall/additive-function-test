<?php

namespace Pardot\Exercise;

final class AdditiveFunctionValidator
{
    /**
     * Is this function additive?
     *
     * @param callable $callable Function to test
     * @param int      $x
     * @param int      $y
     *
     * @return bool True if function is additive, false otherwise
     */
    public static function isAdditive(callable $callable, $x, $y)
    {
        return $callable($x + $y) === $callable($x) + $callable($y);
    }
}

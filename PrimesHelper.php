<?php

namespace Pardot\Exercise;

final class PrimesHelper
{
    /**
     * Returns all prime numbers less than $limit argument.
     *
     * Sieve of Eratosthenes algorithm based on
     * http://www.hashbangcode.com/blog/sieve-eratosthenes-php
     *
     * @param int $limit
     *
     * @return array List of primes
     */
    public static function getPrimesLessThan($limit)
    {
        // Since 2 is the lowest prime, return empty array if $limit is lte 2
        if ($limit <= 2) {
            return [];
        }

        // Initialise the range of numbers.
        $begin = 2;
        $range = range(2, $limit);
        $primes = array_combine($range, $range);

        // Remove composite numbers from range
        while ($begin * $begin < $limit) {
            for ($i = $begin; $i <= $limit; $i += $begin) {
                if ($i === $begin) {
                    continue;
                }

                unset($primes[$i]);
            }

            $begin = next($primes);
        }

        // Use array values to reset keys for consistency's sake (and possible
        // later array manipulations)
        return array_values($primes);
    }

    /**
     * Returns all possible pairs of primes in $primes array.
     *
     * Pairing code based on from http://stackoverflow.com/a/5045187/1134565
     *
     * @param array $primes List of prime numbers
     *
     * @return array Array containing arrays of paired numbers
     */
    public static function getAllPossiblePairs(array $primes)
    {
        $pairs = [];

        for ($i = 0; $i <= (count($primes) - 2); $i++) {
            for ($j = $i + 1; $j <= (count($primes) - 1); $j++) {
                $pairs[] = [$primes[$i], $primes[$j]];
            }
        }

        return $pairs;
    }
}

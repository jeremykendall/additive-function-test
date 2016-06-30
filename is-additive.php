#!/usr/bin/env php
<?php

/**
 * This script tests the behavior of `secret()` and returns whether or not the
 * function is additive.
 */
require_once 'vendor/autoload.php';

use Pardot\Exercise\AdditiveFunctionValidator;
use Pardot\Exercise\PrimesHelper;

if ($argc !== 2 || !is_numeric($argv[1])) {
    echo sprintf('Usage: %s <integer>', basename(__FILE__)) . PHP_EOL;
    exit(1);
}

if ($argv[1] < 3) {
    echo 'Please provide an integer larger than 2.' . PHP_EOL;
    echo '(If the integer provided is less than 3, there are no pairs of prime numbers to test `secret()` against.)' . PHP_EOL;
    exit(1);
}

/**
 * Does something secret. May or may not be additive.
 *
 * @param int $arg
 *
 * @return int
 */
function secret($arg)
{
    return $arg + 1;
}

// Get all primes less than $argv[1]
$primes = PrimesHelper::getPrimesLessThan((int) $argv[1]);

// Test for all combinations x and y (all prime numbers less than $argv[1])
$pairs = PrimesHelper::getAllPossiblePairs($primes);

// Wrap secret() in a closure so I can test the function's behavior in a
// validator as opposed to dumping everything here in this script.
$wrapper = function ($x) {
    return secret($x);
};

// Iterate each combination of primes to ensure secret() is additive for each combination
foreach ($pairs as $pair) {
    if (!AdditiveFunctionValidator::isAdditive($wrapper, $pair[0], $pair[1])) {
        echo 'Function is NOT additive!' . PHP_EOL;
        exit;
    }

    echo 'Function is additive!' . PHP_EOL;
    exit;
}

echo 'Unexpected result. Time for a regression test or two.' . PHP_EOL;
exit(1);

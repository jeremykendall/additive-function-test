#!/usr/bin/env php
<?php

require_once 'vendor/autoload.php';

use Pardot\Exercise\AdditiveFunctionValidator;
use Pardot\Exercise\PrimesHelper;

/*
 * You are given a function 'secret()' that accepts a single integer parameter
 * and returns an integer. In your favorite programming language, write a
 * command-line program that takes one command-line argument (a number) and
 * determines if the secret() function is additive [secret(x+y) = secret(x) +
 * secret(y)], for all combinations x and y, where x and y are all prime numbers
 * less than the number passed via the command-line argument.  Describe how to
 * run your examples. Please generate the list of primes without using built-in
 * functionality.
 *
 * Additional info:
 *
 * This exercise is similar to writing a test for a pre-existing function, like
 * in a library you're using or for a class that's already written.
 *
 * Feel free to include an example "secret()" function for your code to call,
 * such as one where secret(num) returns num times 2.
 *
 * When we look at your code and run it, we'll edit "secret" to return different
 * values and make sure your code properly recognizes whether it's additive or
 * not.
 */

if ($argc !== 2 || !is_numeric($argv[1])) {
    echo sprintf('Usage: %s <integer>', basename(__FILE__)) . PHP_EOL;
    exit(1);
}

if ($argv[1] < 3) {
    echo 'Please provide an integer larger than 2.' . PHP_EOL;
    echo '(If the integer provided is less than 3, there are no pairs of prime numbers to test against.)' . PHP_EOL;
    exit(1);
}

/**
 * Secret, possibly additive function.
 *
 * @param int $arg
 *
 * @return int
 */
function secret($arg)
{
    return $arg;
}

// Wrap secret() so I can pass it to a validator as opposed to writing all the
// code here in this script.
$wrapper = function ($x) {
    return secret($x);
};

// Get all primes less than arg
$primes = PrimesHelper::getPrimesLessThan((int) $argv[1]);

// Test for all combinations x and y (all prime numbers less than arg)
$pairs = PrimesHelper::getAllPossiblePairs($primes);

// Iterate and test to ensure secret() is additive for all combinations x and y
foreach ($pairs as $pair) {
    if (!AdditiveFunctionValidator::isAdditive($wrapper, $pair[0], $pair[1])) {
        echo 'Function is NOT additive!' . PHP_EOL;
        exit;
    }

    echo 'Function is additive!' . PHP_EOL;
    exit;
}

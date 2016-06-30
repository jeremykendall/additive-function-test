# Additive Function Test

You are given a function 'secret()' that accepts a single integer parameter
and returns an integer. In your favorite programming language, write a
command-line program that takes one command-line argument (a number) and
determines if the secret() function is additive [secret(x+y) = secret(x) +
secret(y)], for all combinations x and y, where x and y are all prime numbers
less than the number passed via the command-line argument.

## Preparing the Example

* Clone the project
* Run `composer install`

## Running the Example

You may run the example from the command line like so:

``` bash
$ cd /path/to/project
$ ./is-additive.php <integer>
```

### Examples

#### Additive

Function implementation:

``` php
function secret($arg)
{
    return $arg;
}
```

``` bash
$ ./is-additive.php 324
Function is additive!
```

#### Not Additive

Function implementation:

``` php
function secret($arg)
{
    return $arg + 1;
}
```

``` bash
$ ./is-additive.php 324
Function is NOT additive!
```

## Running the Tests

``` bash
./vendor/bin/phpunit --colors=auto --bootstrap vendor/autoload.php Tests
```

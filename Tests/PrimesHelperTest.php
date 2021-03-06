<?php

namespace Pardot\Exercise\Tests;

use Pardot\Exercise\PrimesHelper;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-06-29 at 18:04:10.
 */
class PrimesHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider primesLessThanDataProvider
     */
    public function testGetPrimesLessThan($limit, $expected)
    {
        $this->assertEquals($expected, PrimesHelper::getPrimesLessThan($limit));
    }

    public function testGetAllPossiblePairs()
    {
        $primes = [
            2,
            3,
            5,
            7,
        ];

        $expected = [
            [2, 3],
            [2, 5],
            [2, 7],
            [3, 5],
            [3, 7],
            [5, 7],
        ];

        $this->assertEquals($expected, PrimesHelper::getAllPossiblePairs($primes));
    }

    public function primesLessThanDataProvider()
    {
        return [
            [
                30,
                [
                    2,
                    3,
                    5,
                    7,
                    11,
                    13,
                    17,
                    19,
                    23,
                    29,
                ],
            ],
            [
                10,
                [
                    2,
                    3,
                    5,
                    7,
                ],
            ],
            [
                18,
                [
                    2,
                    3,
                    5,
                    7,
                    11,
                    13,
                    17,
                ],
            ],
            [
                2,
                [],
            ],
        ];
    }
}

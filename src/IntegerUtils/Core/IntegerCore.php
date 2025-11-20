<?php

namespace Kucil\Utilities\IntegerUtils\Core;

use Kucil\Utilities\IntegerUtils\Contracts\IntegerInterface;
use Kucil\Utilities\IntegerUtils\Enums\RoundOptions;

use function abs;
use function is_int;
use function strlen;
use function round;
use function ceil;
use function floor;
use function str_split;

/**
 * @author  Menyong Menying <menyongmenying.main@gmail.com>
 * 
 * @version 0.0.1
 * 
 * 
 * 
 */
abstract class IntegerCore implements IntegerInterface
{
    /**
     * @see IntegerUtilsTest::testIsInt()
     * 
     * 
     * 
     */
    public static function isInt(mixed $int = null): ?bool
    {
        return is_int($int);
    }



    /**
     * @see IntegerUtilsTest::testIsInteger()
     * 
     * 
     * 
     */
    public static function isInteger(mixed $int = null): ?bool
    {
        return self::isInt($int);
    }



    /**
     * @see IntegerUtilsTest::testIsPositiveNumber()
     * 
     * 
     * 
     */
    public static function isPositiveNumber(?int $int = null): ?bool
    {
        if ($int === null) {
            return null;
        }

        $min = 0;
        
        return $min < $int;
    }



    /**
     * @see IntegerUtilsTest::testIsEvenNumber()
     * 
     * 
     * 
     */
    public static function isEvenNumber(?int $int = null): ?bool
    {
        if ($int === null) {
            return null;
        }

        return $int % 2 === 0;
    }



    /**
     * @see IntegerUtilsTest::testLength()
     * 
     * 
     * 
     */
    public static function length(?int $int = null): ?int
    {
        if ($int === null) {
            return null;
        }

        $result = self::positiveNumber($int);
        $result = (string) $result;

        return strlen($result);
    }



    /**
     * @see IntegerUtilsTest::testPositiveNumber()
     * 
     * 
     * 
     */
    public static function positiveNumber(?int $int = null): ?int
    {
        if ($int === null) {
            return null;
        }

        return abs($int);
    }



    /**
     * @see IntegerUtilsTest::testRandom()
     * 
     * 
     * 
     */
    public static function random(?int $length = 4): ?int
    {
        if ($length === null || $length < 1) {
            return null;
        }

        $min = (int) str_repeat("1", $length - 1) ?: 0; 
        $max = (int) str_repeat("9", $length);

        return random_int($min, $max);
    }



    /**
     * @see IntegerUtilsTest::testRoundNearest()
     * 
     * 
     * 
     */
    public static function roundNearest(?int $int = null, ?int $precision = 1): ?int
    {
        $precision = self::positiveNumber($precision);
        $factor = 10 ** $precision;
        $lengthInt = self::length($int);

        if ($int === null || $precision === null || $precision === 0 || $precision > $lengthInt) {
            return null;
        }

        return (int) round($int / $factor) * $factor;
    }



    /**
     * @see IntegerUtilsTest::testRoundUp()
     * 
     * 
     * 
     */
    public static function roundUp(?int $int = null, ?int $precision = 1): ?int
    {
        $precision = self::positiveNumber($precision);
        $factor = 10 ** $precision;
        $lengthInt = self::length($int);

        if ($int === null || $precision === null || $precision === 0 || $precision > $lengthInt) {
            return null;
        }

        if ($int === 0) {
            $int++;
        }

        return (int) ceil($int / $factor) * $factor;
    }



    /**
     * @see IntegerUtilsTest::testRoudDown()
     * 
     * 
     * 
     */
    public static function roundDown(?int $int = null, ?int $precision = 1): ?int
    {
        $precision = self::positiveNumber($precision);
        $factor = 10 ** $precision;
        $lengthInt = self::length($int);

        if ($int === null || $precision === null || $precision === 0 || $precision > $lengthInt) {
            return null;
        }

        if ($int === 0) {
            $int++;
        }

        return (int) floor($int / $factor) * $factor;
    }



    /**
     * @see IntegerUtilsTest::testRoundNearest()
     * @see IntegerUtilsTest::testRoundUp()
     * @see IntegerUtilsTest::testRoundDown()
     * 
     * 
     * 
     */
    public static function round(?int $int = null, ?int $precision = 1, ?RoundOptions $option = RoundOptions::NEAREST): ?int
    {
        if ($option === null) {
            return null;
        }

        return match ($option) {
            RoundOptions::NEAREST => self::roundNearest($int, $precision),
            RoundOptions::UP => self::roundUp($int, $precision),
            RoundOptions::Down => self::roundDown($int, $precision)
        };
    }


    
    /**
     * @see IntegerUtilsTest::testCut()
     * 
     * 
     * 
     */
    public static function cut(?int $int = null, ?int $length = null): ?int
    {
        $lengthInt = self::length($int);
        $stringInt = str_split((string) $int);
    
        if ($int === null || $length === null || $length <= 0 || $length >= $lengthInt) {
            return null;
        }

        $stringInt = str_split((string) $int);

        $result = '';

        if ($stringInt[0] === '-') {
            $length++;
        }

        for ($i = 0; $i < $length; $i++) {
            $result .= (string) $stringInt[$i];
        }

        return (int) $result;
    }



    /**
     * @see IntegerUtilsTest::testToBool()
     * 
     * 
     * 
     */
    public static function toBool(?int $int = null): ?bool
    {
        return match ($int) {
            0 => false,
            1 => true,
            default => null
        };
    }



    /**
     * @see IntegerUtilsTest::toBoolean()
     * 
     * 
     * 
     */
    public static function toBoolean(?int $int = null): ?bool
    {
        return self::toBool($int);
    }



    /**
     * @see IntegerUtilsTest::testToFlt()
     * 
     * 
     * 
     */
    public static function toFlt(?int $int = null): ?float
    {
        if ($int === null) {
            return null;
        }

        return (float) $int;
    }



    /**
     * @see IntegerUtilsTest::testToFloat()
     * 
     * 
     * 
     */
    public static function toFloat(?int $int = null): ?float
    {
        return self::toFlt($int);
    }



    /**
     * @see IntegerUtilsTest::testToStr()
     * 
     * 
     * 
     */
    public static function toStr(?int $int = null): ?string
    {
        if ($int === null) {
            return null;
        }

        return (string) $int;
    }



    /**
     * @see IntegerUtilsTest::testToString()
     * 
     * 
     * 
     */
    public static function toString(?int $int = null): ?string
    {
        return self::toStr($int);
    }
}
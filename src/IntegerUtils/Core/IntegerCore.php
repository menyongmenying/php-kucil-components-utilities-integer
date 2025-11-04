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
        # DATA
        $result = null;


        # CODE
        $result = is_int($int);

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testIsInteger()
     * 
     * 
     * 
     */
    public static function isInteger(mixed $int = null): ?bool
    {
        # DATA
        $result = null;


        # CODE
        $result = self::isInt($int);

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testIsPositiveNumber()
     * 
     * 
     * 
     */
    public static function isPositiveNumber(?int $int = null): ?bool
    {
        # DATA
        $result = null;
        $min = 0;

        # CODE
        if ($int === null) {
            return $result;
        }

        $result = $min < $int;

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testIsEvenNumber()
     * 
     * 
     * 
     */
    public static function isEvenNumber(?int $int = null): ?bool
    {
        # DATA
        $result = null;

        
        # CODE
        if ($int === null) {
            return $result;
        }

        $result = $int % 2 === 0;

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testLength()
     * 
     * 
     * 
     */
    public static function length(?int $int = null): ?int
    {
        # DATA
        $result = null;


        # CODE
        if ($int === null) {
            return $result;
        }

        $result = self::positiveNumber($int);
        $result = (string) $result;
        $result = strlen($result);
        
        return $result;
    }



    /**
     * @see IntegerUtilsTest::testPositiveNumber()
     * 
     * 
     * 
     */
    public static function positiveNumber(?int $int = null): ?int
    {
        # DATA
        $result = null;


        # CODE
        if ($int === null) {
            return $result;
        }

        $result = abs($int);

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testRandom()
     * 
     * 
     * 
     */
    public static function random(?int $length = 4): ?int
    {
        # DATA
        $result = null;
        $min = null;
        $max = null;


        # CODE
        if ($length === null || $length < 1) {
            return $result;
        }

        $min = (int) str_repeat("1", $length - 1) ?: 0; 
        $max = (int) str_repeat("9", $length);
        $result = random_int($min, $max);

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testRoundNearest()
     * 
     * 
     * 
     */
    public static function roundNearest(?int $int = null, ?int $precision = 1): ?int
    {
        # DATA
        $result = null;
        $precision = self::positiveNumber($precision);
        $factor = 10 ** $precision;
        $lengthInt = self::length($int);


        # CODE
        if ($int === null || $precision === null || $precision === 0 || $precision > $lengthInt) {
            return null;
        }

        $result = round($int / $factor) * $factor;
        $result = (int) $result;

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testRoundUp()
     * 
     * 
     * 
     */
    public static function roundUp(?int $int = null, ?int $precision = 1): ?int
    {
        # DATA
        $result = null;
        $precision = self::positiveNumber($precision);
        $factor = 10 ** $precision;
        $lengthInt = self::length($int);


        # CODE
        if ($int === null || $precision === null || $precision === 0 || $precision > $lengthInt) {
            return null;
        }

        if ($int === 0) {
            $int++;
        }

        $result = ceil($int / $factor) * $factor;
        $result = (int) $result;

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testRoudDown()
     * 
     * 
     * 
     */
    public static function roundDown(?int $int = null, ?int $precision = 1): ?int
    {
        # DATA
        $result = null;
        $precision = self::positiveNumber($precision);
        $factor = 10 ** $precision;
        $lengthInt = self::length($int);


        # CODE
        if ($int === null || $precision === null || $precision === 0 || $precision > $lengthInt) {
            return null;
        }

        if ($int === 0) {
            $int++;
        }

        $result = floor($int / $factor) * $factor;
        $result = (int) $result;

        return $result;
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
        # DATA
        $result = null;


        # CODE
        if ($option === null) {
            return $result;
        }

        $result = match ($option) {
            RoundOptions::NEAREST => self::roundNearest($int, $precision),
            RoundOptions::UP => self::roundUp($int, $precision),
            RoundOptions::Down => self::roundDown($int, $precision)
        };
        
        return $result;
    }


    
    /**
     * @see IntegerUtilsTest::testCut()
     * 
     * 
     * 
     */
    public static function cut(?int $int = null, ?int $length = null): ?int
    {
        # DATA
        $result = null;
        $lengthInt = self::length($int);
        $stringInt = str_split((string) $int);

        
        # CODE
        if ($int === null || $length === null || $length <= 0 || $length >= $lengthInt) {
            return $result;
        }

        $int = (string) $int;
        $int = str_split($int);

        $result = '';

        if ($int[0] === '-') {
            $length++;
        }

        for ($i = 0; $i < $length; $i++) {
            $result .= (string) $int[$i];
        }

        $result = (int) $result;

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testToBool()
     * 
     * 
     * 
     */
    public static function toBool(?int $int = null): ?bool
    {
        # DATA
        $result = null;
        $toBoolMap = require __DIR__ . '/../Mappings/integerToBoolMap.php';
        

        # CODE
        $result = $toBoolMap[$int];

        return $result;
    }



    /**
     * @see IntegerUtilsTest::toBoolean()
     * 
     * 
     * 
     */
    public static function toBoolean(?int $int = null): ?bool
    {
        # DATA
        $result = null;


        # CODE
        $result = self::toBool($int);

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testToFlt()
     * 
     * 
     * 
     */
    public static function toFlt(?int $int = null): ?float
    {
        # DATA
        $result = null;


        # CODE
        if ($int === null) {
            return $result;
        }

        $result = (float) $int;

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testToFloat()
     * 
     * 
     * 
     */
    public static function toFloat(?int $int = null): ?float
    {
        # DATA
        $result = null;

        
        # CODE
        $result = self::toFlt($int);

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testToStr()
     * 
     * 
     * 
     */
    public static function toStr(?int $int = null): ?string
    {
        # DATA
        $result = null;


        # CODE
        if ($int === null) {
            return $result;
        }

        $result = (string) $int;

        return $result;
    }



    /**
     * @see IntegerUtilsTest::testToString()
     * 
     * 
     * 
     */
    public static function toString(?int $int = null): ?string
    {
        # DATA
        $result = null;


        # CODE
        $result = self::toStr($int);

        return $result;
    }
}
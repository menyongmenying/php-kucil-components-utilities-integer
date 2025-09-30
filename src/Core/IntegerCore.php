<?php

namespace Kucil\Components\Utilities\Core;

use Kucil\Components\Utilities\Contracts\IntegerInterface;
use Kucil\Components\Utilities\Enums\IntegerRoundOptions;

use function abs;
use function is_int;
use function strlen;
use function round;
use function ceil;
use function floor;
use function str_split;

/**
 * @author  menyongmenying <menyongmenying.main@email.com>
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
        # Inisasi
        $result = null;


        # Logika
        $result = is_int($int);


        # Penerusan Hasil
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
        # Inisiasi
        $result = null;


        # Logika
        $result = self::isInt($int);


        # Penerusan Hasil
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
        # Inisasi
        $result = null;
        $min = 0;


        # Logika
        if ($int !== null) {
            $result = $min < $int;
        }


        # Penerusan Hasil
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
        # Inisiasi
        $result = null;
        

        # Logika
        if ($int !== null) {
            $result = $int % 2 === 0;
        }

        
        # Penerusan Hasil
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
        # Inisasi
        $result = null;


        # Logika
        if ($int !== null) {
            $int = self::positiveNumber($int);
            $int = (string) $int;
            $result = strlen($int);
        }


        # Penerusan Hasil
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
        # Inisiasi
        $result = null;


        # Logika
        if ($int !== null) {
            $result = $int;
            $result = abs($result);
        }


        # Penerusan Hasil
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
        # Inisiasi
        $result = null;
        $min = null;
        $max = null;


        # Logika
        if ($length !== null && $length > 0) {
            $min = (int) str_repeat("1", $length - 1) ?: 0; 
            $max = (int) str_repeat("9", $length);          

            return random_int($min, $max);
        }


        # Penerusan Hasil
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
        # Inisasi
        $precision = self::positiveNumber($precision);
        $result = null;
        $cond1 = $int !== null;
        $cond2 = $precision !== null;
        $cond3 = $precision !== 0;
        $cond4 = $precision <= self::length($int);
        $factor = null;
        
        
        # Logika
        if ($cond1 && $cond2 && $cond3 && $cond4) {
            $factor = 10 ** $precision;

            $result = round($int / $factor) * $factor;
            $result = (int) $result;
        }   
        
        
        # Penerusan Hasil
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
        # Inisasi
        $precision = self::positiveNumber($precision);
        $result = null;
        $cond1 = $int !== null;
        $cond2 = $precision !== null;
        $cond3 = $precision !== 0;
        $cond4 = $precision <= self::length($int);
        $factor = null;
        
        
        # Logika
        if ($cond1 && $cond2 && $cond3 && $cond4) {
            if ($int === 0) {    
                $int = 1;
            }

            $factor = 10 ** $precision;

            $result = ceil($int / $factor) * $factor;
            $result = (int) $result;
        }   
        
        
        # Penerusan Hasil
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
        # Inisasi
        $precision = self::positiveNumber($precision);
        $result = null;
        $cond1 = $int !== null;
        $cond2 = $precision !== null;
        $cond3 = $precision !== 0;
        $cond4 = $precision <= self::length($int);
        $factor = null;
        
        
        # Logika
        if ($cond1 && $cond2 && $cond3 && $cond4) {
            if ($int === 0) {    
                $int = 1;
            }

            $factor = 10 ** $precision;

            $result = floor($int / $factor) * $factor;
            $result = (int) $result;
        }   
        
        
        # Penerusan Hasil
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
    public static function round(?int $int = null, ?int $precision = 1, ?IntegerRoundOptions $option = IntegerRoundOptions::NEAREST): ?int
    {
        # Inisasi
        $result = null;


        # Logika
        if ($option !== null) {
            $result = match ($option) {
                IntegerRoundOptions::NEAREST => self::roundNearest($int, $precision),
                IntegerRoundOptions::UP => self::roundUp($int, $precision),
                IntegerRoundOptions::Down => self::roundDown($int, $precision)
            };
        }


        # Penerusan Hasil
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
        # Insiasi
        $result = null;
        $cond1 = $int !== null;
        $cond2 = $length !== null;
        $cond3 = $length > 0;
        $cond4 = null;
        
        
        # Logika
        if ($cond1 && $cond2 && $cond3) {
            $cond4 = $length < self::length($int);
            $result = $int;

            if ($cond4) {
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
            }
        }


        # Penerusan Hasil
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
        # Inisasi
        $result = null;

        
        # Logika
        $result = match ($int) {
            0 => false,
            1 => true,
            default => null,
        };


        # Penerusan Hasil
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
        # Inisasi
        $result = null;

        
        # Logika
        $result = self::toBool($int);


        # Penerusan Hasil
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
        # Inisasi
        $result = null;

        
        # Logika
        if ($int !== null) {
            $result = (float) $int;
        }


        # Penerusan Hasil
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
        # Inisasi
        $result = null;

        
        # Logika
        $result = self::toFlt($int);


        # Penerusan Hasil
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
        # Inisiasi
        $result = null;


        # Logika
        if ($int !== null) {
            $result = (string) $int;
        }


        # Penerusan Hasil
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
        # Inisiasi
        $result = null;


        # Logika
        $result = self::toStr($int);


        # Penerusan Hasil
        return $result;
    }
}
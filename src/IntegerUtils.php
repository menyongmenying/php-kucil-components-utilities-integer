<?php

namespace Kucil;

use Kucil\IntegerUtils\RoundOptions;

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
class IntegerUtils
{
    /**
     * Meneruskan hasil pemeriksaan apakah nilai yang diberikan bertipe data integer atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  mixed $int Nilai yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool      Hasil pemeriksaan apakah nilai $int bertipe data integer atau tidak.
     * 
     * @see    IntegerUtilsTest::testIsInt()
     * 
     * 
     */
    public static function isInt(mixed $int = null): ?bool
    {
        return is_int($int);
    }



    /**
     * Meneruskan hasil pemeriksaan apakah nilai yang diberikan bertipe data integer atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  mixed $int Nilai yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool      Hasil pemeriksaan apakah nilai $int bertipe data integer atau tidak.
     * 
     * @see    IntegerUtilsTest::testIsInteger()
     * 
     * 
     */
    public static function isInteger(mixed $int = null): ?bool
    {
        return self::isInt($int);
    }



    /**
     * Meneruskan hasil pemeriksaan apakah nilai integer yang diberikan merupakan bilangan positif atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?int  $int Nilai integer yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool      Hasil pemeriksaan apakah nilai $int merupakan bilangan positif atau tidak.
     * 
     * @see    IntegerUtilsTest::testIsPositiveNumber()
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
     * Meneruskan hasil pemeriksaan apakah nilai integer yang diberikan merupakan bilangan genap atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?int  $int Nilai integer yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool      Hasil pemeriksaan apakah nilai $int merupakan bilangan genap atau tidak.
     * 
     * @see    IntegerUtilsTest::testIsEvenNumber()
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
     * Meneruskan panjang digit dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int $int Nilai integer yang akan dihitung panjang digitnya.
     *
     * @return ?int      Panjang digit dari nilai $int.
     * 
     * @see    IntegerUtilsTest::testLength()
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
     * Meneruskan bilangan positif dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int $int Nilai integer yang akan diteruskan bentuk bilangan positifnya.
     *
     * @return ?int      Bilangan positif dari nilai $int.
     * 
     * @see    IntegerUtilsTest::testPositiveNumber()
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
     * Meneruskan nilai integer acak.
     *
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?int $length Panjang digit integer acak.
     * 
     * @return ?int         Nilai integer acak.
     * 
     * @see    IntegerUtilsTest::testRandom()
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
     * Meneruskan pembulatan bilangan ke terdekat dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int $int       Nilai integer yang akan dijadikan objek pembulatan ke terdekat.      
     * @param  ?int $precision Nilai presisi tingkat level digit pembulatan ke terdekat.
     *
     * @return ?int            Hasil pembulatan bilangan ke terdekat dari nilai $int.
     * 
     * @see    IntegerUtilsTest::testRoundNearest()
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
     * Meneruskan pembulatan bilangan ke atas dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int $int       Nilai integer yang akan dijadikan objek pembulatan ke atas.      
     * @param  ?int $precision Nilai presisi tingkat level digit pembulatan ke atas.
     *
     * @return ?int            Hasil pembulatan bilangan ke atas dari nilai $int.
     * 
     * @see    IntegerUtilsTest::testRoundUp()
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
     * Meneruskan pembulatan bilangan ke bawah dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int $int       Nilai integer yang akan dijadikan objek pembulatan ke bawah.      
     * @param  ?int $precision Nilai presisi tingkat level digit pembulatan ke bawah.
     *
     * @return ?int            Hasil pembulatan bilangan ke bawah dari nilai $int.
     * 
     * @see    IntegerUtilsTest::testRoundDown()
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
     * Meneruskan pembulatan bilangan dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int          $int       Nilai integer yang akan dijadikan objek pembulatan.      
     * @param  ?int          $precision Nilai presisi tingkat level digit pembulatan.
     * @param  ?RoundOptions $option    Jenis pembulatan.
     *
     * @return ?int                            Hasil pembulatan bilangan dari Nilai $int.
     * 
     * @see    IntegerUtilsTest::testRoundNearest()
     * @see    IntegerUtilsTest::testRoundDown()
     * @see    IntegerUtilsTest::testRoundUp()
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
     * Meneruskan hasil penyederhanaan bilangan dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?int $int    Nilai integer yang akan disederhanakan.
     * @param  ?int $length Panjang digit penyederhanaan bilangan dari nilai $int. 
     *
     * @return ?int         Hasil penyederhanaan bilangan dari nilai $int.
     * 
     * @see    IntegerUtilsTest::testCut()
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
     * Meneruskan hasil konversi integer ke boolean dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int  $int Nilai integer yang akan dijadikan objek konversi integer ke boolean. 
     *
     * @return ?bool      Hasil konversi integer ke boolean dari nilai $int.
     * 
     * @see IntegerUtilsTest::testToBool()
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
     * Meneruskan hasil konversi integer ke boolean dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int  $int Nilai integer yang akan dijadikan objek konversi integer ke boolean. 
     *
     * @return ?bool      Hasil konversi integer ke boolean dari nilai $int.
     * 
     * @see IntegerUtilsTest::toBoolean()
     * 
     * 
     */
    public static function toBoolean(?int $int = null): ?bool
    {
        return self::toBool($int);
    }



    /**
     * Meneruskan hasil konversi integer ke float dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int   $int Nilai integer yang akan dijadikan objek konversi integer ke float. 
     *
     * @return ?float      Hasil konversi integer ke float dari nilai $int.
     * 
     * @see IntegerUtilsTest::testToFlt()
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
     * Meneruskan hasil konversi integer ke float dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int   $int Nilai integer yang akan dijadikan objek konversi integer ke float. 
     *
     * @return ?float      Hasil konversi integer ke float dari nilai $int.
     * 
     * @see IntegerUtilsTest::testToFloat()
     * 
     * 
     */
    public static function toFloat(?int $int = null): ?float
    {
        return self::toFlt($int);
    }



    /**
     * Meneruskan hasil konversi integer ke string dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?null $int Nilai integer yang akan dijadikan objek konversi integer ke string.
     *
     * @return ?null      Hasil konversi integer ke string dari nilai $int.
     * 
     * @see    IntegerUtilsTest::testToStr()
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
     * Meneruskan hasil konversi integer ke string dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?null $int Nilai integer yang akan dijadikan objek konversi integer ke string.
     *
     * @return ?null      Hasil konversi integer ke string dari nilai $int.
     * 
     * @see    IntegerUtilsTest::testToString()
     * 
     * 
     */
    public static function toString(?int $int = null): ?string
    {
        return self::toStr($int);
    }
}
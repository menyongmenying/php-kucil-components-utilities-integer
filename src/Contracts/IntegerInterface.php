<?php

namespace Kucil\Components\Utilities\Contracts;

use Kucil\Components\Utilities\Enums\IntegerRoundOptions;

/**
 * @author  menyongmenying <menyongmenying.main@email.com>
 * 
 * @version 0.0.1
 * 
 * 
 * 
 */
interface IntegerInterface
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
     * 
     */
    public static function isInt(mixed $int): ?bool;



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
     * 
     */
    public static function isInteger(mixed $int): ?bool;



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
     * 
     */
    public static function isPositiveNumber(?int $int): ?bool;



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
     * 
     */
    public static function isEvenNumber(?int $int): ?bool;



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
     * 
     */
    public static function length(?int $int): ?int;



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
     * 
     */
    public static function positiveNumber(?int $int): ?int;



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
     * 
     */
    public static function random(?int $length): ?int;



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
     * 
     */
    public static function roundNearest(?int $int, ?int $precision): ?int;



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
     * 
     */
    public static function roundUp(?int $int, ?int $precision): ?int;



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
     * 
     */
    public static function roundDown(?int $int, ?int $precision): ?int;



    /**
     * Meneruskan pembulatan bilangan dari nilai integer yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  ?int                 $int       Nilai integer yang akan dijadikan objek pembulatan.      
     * @param  ?int                 $precision Nilai presisi tingkat level digit pembulatan.
     * @param  ?IntegerRoundOptions $option    Jenis pembulatan.
     *
     * @return ?int                            Hasil pembulatan bilangan dari Nilai $int.
     * 
     * @see    IntegerUtilsTest::testRoundNearest()
     * @see    IntegerUtilsTest::testRoundDown()
     * @see    IntegerUtilsTest::testRoundUp()
     * 
     * 
     * 
     */
    public static function round(?int $int, ?int $precision, ?IntegerRoundOptions $option): ?int;



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
     * 
     */
    public static function cut(?int $int, ?int $length): ?int;



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
     * 
     */
    public static function toBool(?int $int): ?bool;



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
     * 
     */
    public static function toBoolean(?int $int): ?bool;



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
     * 
     */
    public static function toFlt(?int $int): ?float;



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
     * 
     */
    public static function toFloat(?int $int): ?float;



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
     * 
     */
    public static function toStr(?int $int): ?string;



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
     * 
     */
    public static function toString(?int $int): ?string;
}

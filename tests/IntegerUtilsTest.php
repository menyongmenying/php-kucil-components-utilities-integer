<?php

use Kucil\IntegerUtils;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class IntegerUtilsTest extends TestCase
{
    #[Test]
    public function testIsInt(): void
    {
        $this->assertFalse(IntegerUtils::isInt(), 'test-1');
        $this->assertFalse(IntegerUtils::isInt(null), 'test-2');
        $this->assertFalse(IntegerUtils::isInt(true), 'test-3');
        $this->assertTrue(IntegerUtils::isInt(1), 'test-4');
        $this->assertFalse(IntegerUtils::isInt(1.0), 'test-5');
        $this->assertFalse(IntegerUtils::isInt('hello world'), 'test-6');
        $this->assertFalse(IntegerUtils::isInt([]), 'test-7');
        $this->assertFalse(IntegerUtils::isInt(new stdClass), 'test-8');

        return;
    }



    #[Test]
    public function testIsInteger(): void
    {
        $this->assertFalse(IntegerUtils::isInteger(), 'test-1');
        $this->assertFalse(IntegerUtils::isInteger(null), 'test-2');
        $this->assertFalse(IntegerUtils::isInteger(true), 'test-3');
        $this->assertTrue(IntegerUtils::isInteger(1), 'test-4');
        $this->assertFalse(IntegerUtils::isInteger(1.0), 'test-5');
        $this->assertFalse(IntegerUtils::isInteger('hello world'), 'test-6');
        $this->assertFalse(IntegerUtils::isInteger([]), 'test-7');
        $this->assertFalse(IntegerUtils::isInteger(new stdClass), 'test-8');

        return;
    }



    #[Test]
    public function testIsPositiveNumber(): void
    {
        $this->assertNull(IntegerUtils::isPositiveNumber(), 'test-1');
        $this->assertNull(IntegerUtils::isPositiveNumber(null), 'test-2');
        $this->assertTrue(IntegerUtils::isPositiveNumber(100), 'test-3');
        $this->assertFalse(IntegerUtils::isPositiveNumber(0), 'test-4');
        $this->assertFalse(IntegerUtils::isPositiveNumber(-100), 'test-5');

        return;
    }



    #[Test]
    public function testRandom(): void
    {
        $this->assertNull(IntegerUtils::random(null), 'test-1');
        $this->assertIsInt(IntegerUtils::random(2), 'test-2');
        $this->assertIsInt(IntegerUtils::random(100), 'test-3');
        $this->assertNull(IntegerUtils::random(0), 'test-4');
        $this->assertNull(IntegerUtils::random(-100), 'test-5');

        return;
    }



    #[Test]
    public function testIsEvenNumber(): void
    {
        $this->assertNull(IntegerUtils::isEvenNumber(), 'test-1');
        $this->assertNull(IntegerUtils::isEvenNumber(null), 'test-2');
        $this->assertTrue(IntegerUtils::isEvenNumber(100), 'test-3');
        $this->assertTrue(IntegerUtils::isEvenNumber(-100), 'test-4');
        $this->assertTrue(IntegerUtils::isEvenNumber(0), 'test-5');
        $this->assertFalse(IntegerUtils::isEvenNumber(99), 'test-6');
        $this->assertFalse(IntegerUtils::isEvenNumber(-99), 'test-7');

        return;
    }



    public function testLength(): void
    {
        $this->assertNull(IntegerUtils::length(), 'test-1');
        $this->assertNull(IntegerUtils::length(null), 'test-2');
        $this->assertSame(1, IntegerUtils::length(0), 'test-3');
        $this->assertSame(3, IntegerUtils::length(100), 'test-4');
        $this->assertSame(2, IntegerUtils::length(99), 'test-5');
        $this->assertSame(2, IntegerUtils::length(-99), 'test-6');

        return;
    }



    #[Test]
    public function testPositiveNumber(): void
    {
        $this->assertNull(IntegerUtils::positiveNumber(), 'test-1');
        $this->assertNull(IntegerUtils::positiveNumber(null), 'test-2');
        $this->assertSame(100, IntegerUtils::positiveNumber(100), 'test-3');
        $this->assertSame(150, IntegerUtils::positiveNumber(-150), 'test-4');

        return;
    }



    #[Test]
    public function testRoundNearest(): void
    {
        $this->assertNull(IntegerUtils::roundNearest(), 'test-1');
        $this->assertNull(IntegerUtils::roundNearest(null, null), 'test-2');
        $this->assertNull(IntegerUtils::roundNearest(100, null), 'test-3');
        $this->assertNull(IntegerUtils::roundNearest(null, 100), 'test-4');
        $this->assertNull(IntegerUtils::roundNearest(99, 0), 'test-5');
        $this->assertSame(0, IntegerUtils::roundNearest(0, 1), 'test-6');
        $this->assertSame(100, IntegerUtils::roundNearest(99, 1), 'test-7');
        $this->assertSame(90, IntegerUtils::roundNearest(91, 1), 'test-8');
        $this->assertSame(100, IntegerUtils::roundNearest(91, 2), 'test-9');
        $this->assertSame(100, IntegerUtils::roundNearest(91, -2), 'test-10');

        return;
    }


    
    #[Test]
    public function testRoundUp(): void
    {
        $this->assertNull(IntegerUtils::roundUp(), 'test-1');
        $this->assertNull(IntegerUtils::roundUp(null, null), 'test-2');
        $this->assertNull(IntegerUtils::roundUp(100, null), 'test-3');
        $this->assertNull(IntegerUtils::roundUp(null, 100), 'test-4');
        $this->assertNull(IntegerUtils::roundUp(99, 0), 'test-5');
        $this->assertSame(10, IntegerUtils::roundUp(0, 1), 'test-6');
        $this->assertSame(100, IntegerUtils::roundUp(99, 1), 'test-7');
        $this->assertSame(90, IntegerUtils::roundUp(81, 1), 'test-8');
        $this->assertSame(100, IntegerUtils::roundUp(91, 2), 'test-9');
        $this->assertSame(100, IntegerUtils::roundUp(91, -2), 'test-10');

        return;
    }


    
    #[Test]
    public function testRoundDown(): void
    {
        $this->assertNull(IntegerUtils::roundDown(), 'test-1');
        $this->assertNull(IntegerUtils::roundDown(null, null), 'test-2');
        $this->assertNull(IntegerUtils::roundDown(100, null), 'test-3');
        $this->assertNull(IntegerUtils::roundDown(null, 100), 'test-4');
        $this->assertNull(IntegerUtils::roundDown(99, 0), 'test-5');
        $this->assertSame(0, IntegerUtils::roundDown(0, 1), 'test-6');
        $this->assertSame(90, IntegerUtils::roundDown(99, 1), 'test-7');
        $this->assertSame(80, IntegerUtils::roundDown(81, 1), 'test-8');
        $this->assertSame(0, IntegerUtils::roundDown(91, 2), 'test-9');
        $this->assertSame(0, IntegerUtils::roundDown(91, -2), 'test-10');

        return;
    }



    #[Test]
    public function testCut(): void
    {
        $this->assertNull(IntegerUtils::cut(), 'test-1');
        $this->assertNull(IntegerUtils::cut(null, null), 'test-2');
        $this->assertNull(IntegerUtils::cut(12345, null), 'test-3');
        $this->assertNull(IntegerUtils::cut(12345, 0), 'test-4');
        $this->assertNull(IntegerUtils::cut(null, 1), 'test-5');
        $this->assertSame(1, IntegerUtils::cut(12345, 1), 'test-6');
        $this->assertSame(-123, IntegerUtils::cut(-12345, 3), 'test-7');

        return;
    }



    #[Test]
    public function testToBool(): void
    {
        $this->assertNull(IntegerUtils::toBool(), 'test-1');
        $this->assertNull(IntegerUtils::toBool(null), 'test-2');
        $this->assertFalse(IntegerUtils::toBool(0), 'test-3');
        $this->assertTrue(IntegerUtils::toBool(1), 'test-4');
        $this->assertNull(IntegerUtils::toBool(99), 'test-5');

        return;
    }



    #[Test]
    public function toBoolean(): void
    {
        $this->assertNull(IntegerUtils::toBoolean(), 'test-1');
        $this->assertNull(IntegerUtils::toBoolean(null), 'test-2');
        $this->assertFalse(IntegerUtils::toBoolean(0), 'test-3');
        $this->assertTrue(IntegerUtils::toBoolean(1), 'test-4');
        $this->assertNull(IntegerUtils::toBoolean(99), 'test-5');

        return;
    }



    #[Test]
    public function testToBoolean(): void
    {
        $this->assertNull(IntegerUtils::toBoolean(), 'test-1');
        $this->assertNull(IntegerUtils::toBoolean(null), 'test-2');
        $this->assertFalse(IntegerUtils::toBoolean(0), 'test-3');
        $this->assertTrue(IntegerUtils::toBoolean(1), 'test-4');
        $this->assertNull(IntegerUtils::toBoolean(99), 'test-5');

        return;
    }



    #[Test]
    public function testToFlt(): void
    {
        $this->assertNull(IntegerUtils::toFlt(), 'test-1');
        $this->assertNull(IntegerUtils::toFlt(null), 'test-2');
        $this->assertSame(0.0, IntegerUtils::toFlt(0), 'test-3');
        $this->assertSame(99.0, IntegerUtils::toFlt(99), 'test-4');
        $this->assertSame(-99.0, IntegerUtils::toFlt(-99), 'test-5');

        return;
    }



    #[Test]
    public function testToFloat(): void
    {
        $this->assertNull(IntegerUtils::toFloat(), 'test-1');
        $this->assertNull(IntegerUtils::toFloat(null), 'test-2');
        $this->assertSame(0.0, IntegerUtils::toFloat(0), 'test-3');
        $this->assertSame(99.0, IntegerUtils::toFloat(99), 'test-4');
        $this->assertSame(-99.0, IntegerUtils::toFloat(-99), 'test-5');

        return;
    }



    #[Test]
    public function testToStr(): void
    {
        $this->assertNull(IntegerUtils::toStr(), 'test-1');
        $this->assertNull(IntegerUtils::toStr(null), 'test-2');
        $this->assertSame('0', IntegerUtils::toStr(0), 'test-3');
        $this->assertSame('99', IntegerUtils::toStr(99), 'test-4');
        $this->assertSame('-99', IntegerUtils::toStr(-99), 'test-5');

        return;
    }



    #[Test]
    public function testToString(): void
    {
        $this->assertNull(IntegerUtils::toString(), 'test-1');
        $this->assertNull(IntegerUtils::toString(null), 'test-2');
        $this->assertSame('0', IntegerUtils::toString(0), 'test-3');
        $this->assertSame('99', IntegerUtils::toString(99), 'test-4');
        $this->assertSame('-99', IntegerUtils::toString(-99), 'test-5');

        return;
    }
}
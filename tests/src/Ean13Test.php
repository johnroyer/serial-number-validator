<?php

namespace Zeroplex\Test;

use PHPUnit\Framework\TestCase;
use Zeroplex\Ean13;

class Ean13Test extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @dataProvider ean13numeraldataProvider
     */
    public function testNumeralCheck($input, $expected)
    {
        $this->assertSame(
            $expected,
            Ean13::isAllNumber($input)
        );
    }

    public function ean13numeraldataProvider()
    {
        return [
            ['123', true],
            ['abc', false],
            ['1234567890123', true],
            ['123ABC7890123', false],
        ];
    }

    /**
     * @dataProvider codeLengthProvider
     */
    public function testStringLengthChecker($input, $expected)
    {
        $this->assertSame(
            $expected,
            Ean13::isLengthCorrect($input)
        );
    }

    public function codeLengthProvider()
    {
        return [
            ['4908569219689', true],
            ['123', false],
            ['4711234560011', true],
        ];
    }

    /**
     * @dataProvider validCodeProvider
     */
    public function testChecksumCaculator($input, $expected)
    {
        $checksum = Ean13::getCheckSum($input);
        $lastChar = substr($input, -1, 1);

        $this->assertEquals($checksum, $lastChar);
    }

    public function validCodeProvider()
    {
        return [
            ['4908569219689', true],
            ['5690351390155', true],
            ['4891234567867', true],
            ['5053177132017', true],
        ];
    }

    public function invalidCodeProvider()
    {
        return [
            ['4908569219680', true],
            ['5690351390150', false],
            ['4891234567860', false],
            ['5053177132010', false],
        ];
    }

    /**
     * @dataProvider validCodeProvider
     */
    public function testValidatorWithCorrectCode($input, $expected)
    {
        $this->assertTrue(
            Ean13::isValid($input)
        );
    }
}

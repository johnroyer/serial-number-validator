<?php

namespace Zeroplex\Test;

use PHPUnit\Framework\TestCase;
use Zeroplex\Ean8;

class Ean8Test extends TestCase
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
     * @dataProvider barcodeLengthProvider
     */
    public function testLengthChecker($input, $expected)
    {
        $this->assertSame(
            $expected,
            Ean8::isLengthCorrect($input)
        );
    }

    public function barcodeLengthProvider()
    {
        return [
            ['20123451', true],
            ['12345670', true],
            ['49372953', true],
            ['99999995', true],
            ['00000000', true],

            ['2012345', false],
            ['123456970', false],
            ['4933872953', false],
            ['999995', false],
            ['0000', false],
        ];
    }

    /**
     * @dataProvider barcodeCharacterProvider
     */
    public function testBarcodeIsOnlyNumbers($in, $exp)
    {
        $this->assertSame(
            $exp,
            Ean8::isAllNumber($in)
        );
    }

    public function barcodeCharacterProvider()
    {
        return [
            ['20123451', true],
            ['12345670', true],
            ['49372953', true],
            ['99999995', true],
            ['00000000', true],

            ['2a123451', false],
            ['b2345670', false],
            ['xxx72953', false],
            ['ooo99995', false],
            ['<>000000', false],
        ];
    }

    /**
     * @dataProvider checksumProider
     */
    public function testChecksumCounter($in, $exp)
    {
        $counted = Ean8::getCheckSum($in);

        $this->assertSame(
            $exp,
            $counted
        );
    }

    public function checksumProider()
    {
        return [
            ['20123451', 1],
            ['12345670', 0],
            ['49372953', 3],
            ['99999995', 5],
            ['00000000', 0],
            ['12345670', 0],
        ];
    }
}

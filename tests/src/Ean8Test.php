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
}

<?php

namespace Zeroplex\Test;

use PHPUnit\Framework\TestCase;
use Zeroplex\Isbn13;

class Isbn13Test extends TestCase
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
     * @dataProvider code978Provider
     */
    public function test978Checker($in, $exp)
    {
        $this->assertSame(
            $exp,
            Isbn13::is978Exist($in)
        );
    }

    public function code978Provider()
    {
        return [
            ['9789862623893', true],
            ['9789578787995', true],
            ['9789576581557', true],
            ['9789862357613', true],
            ['9783836571135', true],
            ['9781640092402', true],

            ['2764171200420', false],
            ['2764171160427', false],
            ['2764171180425', false],
        ];
    }

    /**
     * @dataProvider codeProvider
     */
    public function testIfAllNumber($in, $exp)
    {
        $this->assertSame(
            $exp,
            Isbn13::isAllNumber($in)
        );
    }

    public function codeProvider()
    {
        return [
            ['7297465', true],
            ['758067385', true],
            ['12675843', true],

            ['frergh', false],
            ['498gd932', false],
            ['iuh;fr*wfr', false],
        ];
    }

    /**
     * @dataProvider stringLengthProvider
     */
    public function testStringLengthChecker($in, $exp)
    {
        $this->assertSame(
            $exp,
            Isbn13::isLengthCorrect($in)
        );
    }

    public function stringLengthProvider()
    {
        return [
            ['9789862623893', true],
            ['9789578787995', true],
            ['9781640092402', true],

            ['7297465', false],
            ['758067385', false],
            ['12675843', false],
            ['frergh', false],
            ['498gd932', false],
            ['iuh;fr*wfr', false],
        ];
    }

    /**
     * @dataProvider checksumProvider
     */
    public function testChecksumCounter($in, $exp)
    {
        $this->assertEquals(
            $exp,
            Isbn13::getCheckSum($in)
        );
    }

    public function checksumProvider()
    {
        return [
            ['9789862623893', 3],
            ['9789578787995', 5],
            ['9781640092402', 2],
        ];
    }

    /**
     * @dataProvider stringLengthProvider
     */
    public function testIsbnValidator($in, $exp)
    {
        $this->assertSame(
            $exp,
            Isbn13::isValidate($in)
        );
    }
}

<?php

namespace Zeroplex\Test;

use PHPUnit\Framework\TestCase;
use Zeroplex\TaiwanId;

class TaiwanIdTest extends TestCase
{
    public function setUp(): void
    {
    }

    public function tearDown(): void
    {
    }

    /**
     * @dataProvider fateIdProvider
     */
    public function testLengthhecker($data, $exp)
    {
        $this->assertSame(
            $exp,
            TaiwanId::islengthValid($data)
        );
    }

    public function fateIdProvider()
    {
        return [
            ['E188262805', true],
            ['E193656122', true],
            ['E144320831', true],
            ['A175448', false],
            ['A19398065', false],
            ['A1205', false],
            ['147', false],
            ['U110719934', true],
            ['U154631139', true],

        ];
    }

    /**
     * @dataProvider fakeGeoProvider
     */
    public function testGeoChecker($data, $exp)
    {
        $this->assertSame(
            $exp,
            TaiwanId::isGeoValid($data)
        );
    }

    public function fakeGeoProvider()
    {
        return [
            ['Q108319546', true],
            ['H265273065', true],
            ['H289647594', true],
            ['@134727656', false],
            ['!288596000', false],
            ['(265974980', false],
        ];
    }

    /**
     * @dataProvider idProvider
     */
    public function testChecksumCounter($data, $exp)
    {
        $this->assertSame(
            $exp,
            TaiwanId::getCheckSum($data)
        );
    }

    public function idProvider()
    {
        return [
            ['W100232754', 4],
            ['J206702639', 9],
            ['J273827452', 2],
            ['D134420056', 6],
            ['D169087729', 9],
            ['U161613212', 2],
        ];
    }

    /**
     * @dataProvider genderProvider
     */
    public function testGebderChecker($data, $exp)
    {
        $this->assertSame(
            $exp,
            TaiwanId::isMale($data)
        );
    }

    public function genderProvider()
    {
        return [
            ['W100232754', true],
            ['J206702639', false],
            ['J273827452', false],
            ['D134420056', true],
            ['D169087729', true],
            ['U161613212', true],
        ];
    }

    /**
     * @dataProvider validIdProvider
     */
    public function testValidator($data, $exp)
    {
        $this->assertSame(
            $exp,
            TaiwanId::isValid($data)
        );
    }

    public function validIdProvider()
    {
        return [
            ['Z128965300', true],
            ['C107804367', true],
            ['C111272793', true],
            ['C139128038', true],
            ['E238553282', true],
            ['E251315137', true],
            ['E211831894', true],
            ['L185170332', true],
            ['L101989868', true],
            ['L108828993', true],
            ['W292274553', true],
            ['W245957161', true],
            ['W200130113', true],
            ['Z167383128', true],
            ['Z179654561', true],
        ];
    }
}

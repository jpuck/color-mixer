<?php

use jpuck\ColorMixer\{Color};

class ColorTest extends PHPUnit_Framework_TestCase
{
    public function colorStringDataProvider()
    {
        return [
            ['f03'],
            ['#f03'],
            ['F03'],
            ['#F03'],
            ['ff0033'],
            ['#ff0033'],
            ['FF0033'],
            ['#FF0033'],
//             [255, 0, 51],
//             ['100%','0%','20%'],
//             ['100%,0%,20%'],
//             ['100%, 0%, 20%'],
        ];
    }

    /**
     *  @dataProvider colorStringDataProvider
     */
    public function testCanCreateColor($colorString)
    {
        $this->assertInstanceOf(Color::class, new Color($colorString));
    }

    public function invalidColorStringDataProvider()
    {
        return [
            ['f033'],
            ['#f033'],
            ['F0333'],
            ['#F0333'],
            ['ff003s'],
            ['#ff003s'],
            ['FF003Z'],
            ['#FF003Z'],
        ];
    }

    /**
     *  @dataProvider invalidColorStringDataProvider
     */
    public function testCanInvalidateColorString($colorString)
    {
        $this->assertFalse(Color::validateHexColorString($colorString));
    }

    public function invalidColorConstructorDataProvider()
    {
        return $this->invalidColorStringDataProvider();
    }

    /**
     *  @dataProvider invalidColorConstructorDataProvider
     */
    public function testCanInvalidateColorConstructor($colorString)
    {
        $this->expectException(InvalidArgumentException::class);
        new Color($colorString);
    }
}

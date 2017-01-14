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
            [255, 0, 51],
            ['100%','0%','20%'],
            ['100%,0%,20%'],
            ['100%, 0%, 20%'],
        ];
    }

    /**
     *  @dataProvider colorStringDataProvider
     */
    public function testCanCreateColor($colorString)
    {
        $this->assertInstanceOf(Color::class, new Color($colorString));
    }
}

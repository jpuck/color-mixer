<?php

use jpuck\ColorMixer\Mixer;

class MixerTest extends PHPUnit_Framework_TestCase
{
    public function testCanCreateMixer()
    {
        $this->assertInstanceOf(Mixer::class, new Mixer('00FF00', '#333'));
    }

    public function testCanGetColors()
    {
        $brown = '#A52A2A';
        $green = '#008000';
        $mixer = new Mixer($brown, $green);

        $this->assertSame($brown, $mixer->colors()[0]->hex());
        $this->assertSame($green, $mixer->colors()[1]->hex());
    }

    public function testCanAddColor()
    {
        $brown = '#A52A2A';
        $green = '#008000';
        $black = '#000000';
        $mixer = new Mixer($brown, $green);

        $mixer->addColor($black);

        $this->assertSame($black, $mixer->colors()[2]->hex());
    }

    public function testCanMixColors()
    {
        $black = '000000';
        $white = 'ffffff';
        $gray  = '#808080';
        $mixer = new Mixer($black, $white);

        $this->assertSame($gray, $mixer->mix()->hex());
    }
}

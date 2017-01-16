<?php namespace jpuck\ColorMixer;

class Mixer
{
    protected $colors = [];

    /**
     * Creates an instance of Color.
     *
     * @param mixed ...$colors Color objects or strings
     *
     * @return Color Returns a new instance of Mixer.
     */
    public function __construct(...$colors)
    {
        foreach ($colors as $color) {
            $this->addColor($color);
        }
    }

    /**
     * Adds a color to the Mixer.
     *
     * @param mixed Color object or string
     *
     * @return null
     */
    public function addColor($color)
    {
        if ( ! $color instanceof Color ) {
            $color = new Color($color);
        }

        $this->colors []= $color;
    }

    /**
     * Get the colors.
     *
     * @return array Returns array of Color objects.
     */
    public function colors() : array
    {
        return $this->colors;
    }

    /**
     * Get the mixed color.
     *
     * @return Color Returns a new Color object from the Mixer.
     */
    public function mix() : Color
    {
        foreach ($this->colors as $color) {
            $colors  = $color->dec();
            $reds  []= $colors[0];
            $greens[]= $colors[1];
            $blues []= $colors[2];
        }

        $red   = dechex( round(array_sum($reds)  / count($reds)  ) );
        $green = dechex( round(array_sum($greens)/ count($greens)) );
        $blue  = dechex( round(array_sum($blues) / count($blues) ) );

        // pad single-digit hexadecimals with leading zero
        foreach ([&$red, &$green, &$blue] as &$color) {
            if (strlen($color) === 1) {
                $color = "0$color";
            }
        }

        return new Color($red.$green.$blue);
    }
}

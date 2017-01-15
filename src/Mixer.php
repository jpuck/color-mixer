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
}
